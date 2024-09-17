@extends('backend.layout.app', ['title' => 'Upcoming Album'])

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatable/css/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.tailwind.min.css">

    <style>
        .dataTables_wrapper .dataTables_length select {
            width: 68px;
            font-size: 14px;
            border: 0;
            border-radius: 0px;
            padding: 5px;
            background-color: transparent;
            padding: 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: rgb(60 186 222 / var(--tw-bg-opacity));
            color: white !important;
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: rgb(32 183 153 / var(--tw-bg-opacity));
            color: white !important;
            border: none;
        }

        .dataTables_wrapper .dataTables_filter input {
            margin-left: 11px;
        }

        td,
        td p {
            font-size: 15px;
        }

        #data-table {
            border: 0;
            margin-bottom: 24px;
        }
    </style>
@endpush

@section('main')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <h1 class="text-center text-2xl font-bold p-4 bg-gray-100">Upcoming Album</h1>
            <div class="p-6">
                <div class="mb-4">
                    <a href="{{ route('upcomming.album.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create New
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table id="data-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Release Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Image_URL</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Table rows will be populated by DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/vendors/datatable/js/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.tailwind.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            var searchable = [];
            var selectable = [];
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                }
            });

            if (!$.fn.DataTable.isDataTable('#data-table')) {
                let dTable = $('#data-table').DataTable({
                    order: [],
                    lengthMenu: [
                        [25, 50, 100, 200, 500, -1],
                        [25, 50, 100, 200, 500, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    language: {
                        processing: `<div class="text-center">
                        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                        </div>`
                    },
                    scroller: {
                        loadingIndicator: false
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('upcomming.album.index') }}",
                        type: "get",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'title', name: 'title', orderable: true, searchable: true },
                        { data: 'location', name: 'location', orderable: true, searchable: true },
                        { data: 'performance_date', name: 'performance_date', orderable: true, searchable: true },
                        { data: 'image', name: 'image', orderable: true, searchable: true },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                    ],
                });

                dTable.buttons().container().appendTo('#file_exports');
            }
        });

        function showDeleteConfirm(id) {
            event.preventDefault(); // Prevent default anchor behavior
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id); // Call your AJAX delete function
                }
            });
        }

        function deleteItem(id) {
            var url = '{{ route('upcomming.album.delete', ':id') }}';
            url = url.replace(':id', id);
            var csrfToken = '{{ csrf_token() }}';

            $.ajax({
                type: "DELETE",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(resp) {
                    if (resp.success) {
                        toastr.success(resp.message);
                        $('#data-table').DataTable().ajax.reload(); // Reload DataTable after successful deletion
                    } else {
                        toastr.error(resp.message);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        }
    </script>
@endpush
