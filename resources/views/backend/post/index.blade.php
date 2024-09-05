@extends('backend.layout.app', ['title' => 'Posts'])

@section('main')

    <div class="table-responsive">
        <div class="justify-content-between align-items-center">
            <h1 style="text-align: center">Posts</h1>
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">
            <i class="fas fa-plus"></i>
            Create Post
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->user->name }} ({{ $post->user->email }})</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->description) }}</td>
                        <td>
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" width="100" height="100" alt="">
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $posts->links() }}


@endsection

