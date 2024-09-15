@extends('backend.layout.app', ['title' => 'Album List'])

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('main')
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Albums List</h1>
        <hr class="mb-6">
        {{-- "Create New" button --}}
        <a href="{{ route('album.create') }}"
            class="inline-block bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Create New
        </a>

        <table class="min-w-full divide-y divide-gray-200 mt-6">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">SL</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Release Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($albums as $album)
                    <tr>
                        <td class="px-2 py-2 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm font-medium text-gray-900">Album ID: {{ $album->id }} (User: {{ $album->user->name }})</td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-900">{{ $album->title }}</td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-900">{{ $album->release_date->format('d-m-Y') }}</td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-900">
                            @if ($album->image)
                                <img src="{{ asset('storage/' . $album->image) }}" alt="Image" class="w-24 h-auto">
                            @else
                                No Image Found.
                            @endif
                        </td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-900">{{ $album->user->name }}</td>
                        <td class="px-2 py-2 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('album.edit', $album->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form id="delete-form-{{ $album->id }}" action="{{ route('album.destroy', $album->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-600" onclick="confirmDelete('{{ $album->id }}')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-2 py-2 text-gray-900">No albums found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $albums->links() }}
        </div>
    </div>
@endsection

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

        function confirmDelete(albumId) {
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
                    document.getElementById('delete-form-' + albumId).submit();
                }
            });
        }
    </script>
@endpush
