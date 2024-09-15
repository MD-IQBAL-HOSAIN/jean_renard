@extends('backend.layout.app', ['title' => 'Posts Create'])

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
    <div class="container p-3 border border-black" style="width: 50vw; border-radius: 10px">
        <h1 style="text-align: center">Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="dropify form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
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
