<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcommingAlbum extends Model
{
    use HasFactory;
    protected $guarded = [];


    //I used accesors to get the image url in the blade file
    public function getImageUrlAttribute($value)
    {
        return 'storage/' . $value;
    }
}
