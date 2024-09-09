@if(session('t-success'))
    <div class="alert alert-success text-center p-4 italic text-2xl font-semibold bg-bisque w-full mx-auto rounded-lg">
    {{-- <div class="alert alert-success text-center p-4 italic text-2xl font-semibold bg-success text-white max-w-6xl w-full mx-auto rounded-lg mt-2"> --}}
        {{ session('t-success') }}
    </div>
@endif

@if(session('t-error'))
    <div class="alert alert-danger bg-red-600 text-white border border-red-700 rounded-lg shadow-lg">
        {{ session('t-error') }}
    </div>
@endif