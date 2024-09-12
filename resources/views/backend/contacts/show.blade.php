@extends('backend.layout.app', ['title' => 'Contact Details'])

@section('main')
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Contact Details</h1>
        <hr class="mb-6">

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-900">{{ $contact->name }}</h2>
                <a href="{{ route('contacts.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Back to List
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Email</h3>
                    <p class="text-gray-900">{{ $contact->email }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Phone</h3>
                    <p class="text-gray-900">{{ $contact->phone }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Address</h3>
                    <p class="text-gray-900">{{ $contact->address }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Country</h3>
                    <p class="text-gray-900">{{ $contact->country }}</p>
                </div>
                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700">Message</h3>
                    <p class="text-gray-900">{{ $contact->message }}</p>
                </div>
            </div>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block mt-4 bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
