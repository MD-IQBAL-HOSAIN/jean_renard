@extends('backend.layout.app', ['title' => 'Blog List'])

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('main')
    <div class="container mx-auto p-6 bg-white border border-black-200 rounded-lg shadow-md">
        <h1 class="text-center text-2xl font-bold mb-6">Blog List</h1>
        <hr>
        <div class="mb-6 mt-2">
            <a href="{{ route('blog.create') }}"
                class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                <i class="fas fa-plus mr-2"></i>
                Add New
            </a>
        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-black-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-2 py-2 text-left text-xs font-bold text-black-500 uppercase tracking-wider">ID</th>
                        <th class="px-2 py-2 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Title</th>
                        <th class="px-2 py-2 text-left text-xs font-bold text-black-500 uppercase tracking-wider">
                            Description</th>
                        <th class="px-2 py-2 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Author
                        </th>
                        <th class="px-2 py-2 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Image</th>
                        <th class="px-2 py-2 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($Blogs as $Blog)
                        <tr>
                            <td class="px-2 py-2 whitespace-nowrap text-sm font-medium text-gray-900">{{ $Blog->id }}
                            </td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-black-500">{{ $Blog->title }}</td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-black-500">
                                {{ Str::limit($Blog->description, 50) }}</td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-black-500">{{ $Blog->User->name }}</td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-black-500">
                                @if ($Blog->image)
                                    <img src="{{ asset('storage/' . $Blog->image) }}" alt="{{ $Blog->title }}"
                                        class="w-24 h-24 object-cover rounded-md">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('blog.edit', $Blog->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form id="delete-form-{{ $Blog->id }}" action="{{ route('blog.destroy', $Blog->id) }}"
                                    method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-500 hover:text-red-600"
                                    onclick="confirmDelete('{{ $Blog->id }}')">
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
            {{ $Blogs->links('pagination::tailwind') }}
        </div>
    </div>
@endsection

@push('style')
@endpush

@push('script')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('swalMsg'))
                const swalMsg = @json(session('swalMsg'));

                Swal.fire({
                    title: swalMsg.type === 'success' ? 'Success!' : 'Error!',
                    text: swalMsg.message,
                    icon: swalMsg.type,
                    showCancelButton: false,
                    confirmButtonText: 'Ok',
                    // cancelButtonText: 'Cancel',
                    // cancelButtonColor: '#d33'
                });
            @endif
        });

        function confirmDelete(BlogId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Find and submit the form
                    document.getElementById('delete-form-' + BlogId).submit();
                }
            });
        }
    </script>
@endpush
