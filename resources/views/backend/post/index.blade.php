@extends('backend.layout.app', ['title' => 'Posts'])

@section('main')

    <div class="table-responsive">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Posts</h1>
            <a href="{{ route('backend.post.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Create Post
            </a>
        </div>
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
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->image }}</td>
                       {{--  <td>
                            <a href="{{ route('backend.post.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('backend.post.destroy', $post->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $posts->links() }}


@endsection

