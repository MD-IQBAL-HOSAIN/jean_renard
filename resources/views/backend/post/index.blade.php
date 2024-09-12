@extends('backend.layout.app', ['title' => 'Posts'])

@section('main')
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">All Post</h1>
        <hr class="mb-6">

        <a href="{{ route('posts.create') }}"
            class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            <i class="fas fa-plus mr-2"></i>
            Create Post
        </a>

        <div class="mt-6 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">
                            Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $post->user->name }} ({{ $post->user->email }})
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ Str::limit($post->description, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" width="100" height="100"
                                        alt="Image" class="object-cover rounded-md">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="text-yellow-500 hover:text-yellow-600">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                    class="inline-block ml-2">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
