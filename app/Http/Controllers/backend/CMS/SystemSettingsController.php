<?php

namespace App\Http\Controllers\backend\CMS;

use Exception;
use Illuminate\Http\Request;
use App\Models\SystemSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SystemSettingsController extends Controller
{
    public function index()
    {
        $setting = SystemSettings::latest('id')->first();
        return view('backend.Settings.system-settings.index', compact('setting'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'system_name' => 'nullable',
            'description' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            'copyright' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $setting = SystemSettings::findOrFail($id);

            $setting->system_name = $request->system_name;
            $setting->description = $request->description;
            $setting->copyright = $request->copyright;


            if ($request->hasFile('logo')) {

                if ($setting->logo) {
                    Storage::disk('public')->delete($setting->logo);
                }

                $logoPath = $request->file('logo')->store('setting/logo', 'public');
                $setting->logo = $logoPath;
            }


            if ($request->hasFile('favicon')) {

                if ($setting->favicon) {
                    Storage::disk('public')->delete($setting->favicon);
                }

                $faviconPath = $request->file('favicon')->store('setting/favicon', 'public');
                $setting->favicon = $faviconPath;
            }

            $setting->save();
            return back()->with('success', 'System Settings Updated Successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Sorry! Something went wrong: ' . $e->getMessage());
        } catch (Exception $e) {
            return back()->with('error', 'Sorry! Something went wrong: ' . $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
