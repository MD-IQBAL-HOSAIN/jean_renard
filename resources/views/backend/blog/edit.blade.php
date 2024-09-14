@extends('backend.layout.app', ['title' => 'Edit Blog'])

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

    <style>
        .dropify-wrapper .dropify-preview .dropify-render img {
            top: 50%;
            left: 35%;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
            position: relative;
            max-width: 100%;
            max-height: 100%;
            background-color: #FFF;
            -webkit-transition: border-color 0.15s linear;
            transition: border-color 0.15s linear;
        }
    </style>
@endpush

@section('main')
<div class="container mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow-md">
    <h1 class="text-center text-3xl font-bold mb-6">Edit Blog</h1>
    <hr class="mb-6">
    <?php
    // dd($blog)
    ?>
    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-500 @enderror">
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description', $blog->description) }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" id="image" name="image"
                class="dropify mt-1 block w-full text-sm text-gray-500 file:border file:border-gray-300 file:rounded-md file:px-4 file:py-2 file:text-sm file:font-medium file:bg-gray-50 hover:file:bg-gray-100 @error('image') border-red-500 @enderror"
                data-default-file="{{ $blog->image ? asset('storage/' . $blog->image) : '' }}">
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('blog.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-semibold rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <i class="fas fa-arrow-left mr-2"></i>
                Back
            </a>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <i class="fas fa-save mr-2"></i>
                Update
            </button>
        </div>
    </form>
</div>
@endsection

@push('script')
    <!-- Dropify JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush
