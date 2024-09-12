@extends('backend.layout.app', ['title' => 'Contacts'])

@section('main')
    <div class="container mx-auto p-6">
        <h1 class="text-center text-3xl font-bold mb-6">Contacts Messages</h1>
        <hr class="mb-6">

        <table class="min-w-full divide-y divide-gray-200 mt-6">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">SL</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Address</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Country</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($contacts as $contact)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contact->country }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ Str::of($contact->message)->substr(0, 20) . '...' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('contacts.show', $contact->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white font-semibold rounded-md shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                    <i class="fas fa-eye mr-2"></i> View
                                </a>
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-semibold rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                    onclick="confirmDelete('{{ $contact->id }}')">
                                    <i class="fas fa-trash mr-2"></i> Delete
                                </button>

                                <form id="delete-form-{{ $contact->id }}"
                                    action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                    style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <script>
                                    function confirmDelete(contactId) {
                                        if (confirm('Are you sure you want to delete this contact?')) {
                                            document.getElementById('delete-form-' + contactId).submit();
                                        }
                                    }
                                </script>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-6 py-4 text-gray-900">No contacts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    </div>
@endsection
