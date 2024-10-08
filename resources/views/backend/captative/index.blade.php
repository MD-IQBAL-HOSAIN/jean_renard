@extends('backend.layout.app', ['title' => 'Captative Moments'])


@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('main')
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Captative Moments List</h1>
        <hr class="mb-6">
        <a href="{{ route('captivating.create') }}"
            class="inline-block bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            Create New
        </a>

        <table class="min-w-full divide-y divide-gray-200 mt-6">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">SL</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Description
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($captative as $cap)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Cap ID: {{ $cap->id }} (User: {{ $cap->user->name }})
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cap->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $cap->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if ($cap->image)
                                <img src="{{ asset('storage/' . $cap->image) }}" alt="Image" class="w-24 h-auto">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('captivating.edit', ['id' => $cap->id]) }}"
                                class="text-yellow-500 hover:text-yellow-600">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form id="delete-form-{{ $cap->id }}" action="{{ route('captivating.destroy', $cap->id) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-600"
                                    onclick="confirmDelete({{ $cap->id }})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-900">No captative Moment found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
       
        <div class="mt-2">
            {{ $captative->links() }}
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

        function confirmDelete(postId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Find and submit the form with the specific ID
                    document.getElementById('delete-form-' + postId).submit();
                }
            });
        }
    </script>
@endpush
