@extends('backend.layout.app', ['title' => 'Create Post'])

@section('main')


    <div class="table-responsive">
        <div class="justify-content-between align-items-center">
            <h1 style="text-align: center">Posts</h1>
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">
            <i class="fas fa-plus"></i>
            Create Post
        </a>
           <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
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
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image', '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
@endsection

                   