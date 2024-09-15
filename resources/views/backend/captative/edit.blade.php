@extends('backend.layout.app', ['title' => 'Edit Captative Moment'])

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
    <div class="container mt-3 card" style="width: 50vw;">
        <div class="card-header">
            <h4 class="card-title text-center">Edit Captative Moment</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('captivating.update', $captative->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $captative->title) }}" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="5" required>{{ old('description', $captative->description) }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $captative->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="dropify form-control @error('image') is-invalid @enderror" id="image"
                        name="image" accept="image/*"
                        data-default-file="{{ $captative->image ? asset('storage/' . $captative->image) : '' }}" />

                </div>
                <div class="flex items-center justify-between space-x-2 mt-4">
                    <a href="{{ url()->previous() }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
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
