<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books List') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h4>Available Books</h4>
            <a href="{{ route('books.export-pdf', $book->id) }}" class="btn btn-success">Export as PDF</a>
        </div>

        <div class="row">
            @foreach ($books as $book)
            <div class="card">
                <h5>{{ $book->title }}</h5>
                <p>Author: {{ $book->author }}</p>
                <p>Status: {{ $book->status ? 'Available' : 'Unavailable' }}</p>
                <a href="{{ route('books.export-pdf', $book->id) }}" class="btn btn-success">Download PDF</a>
            </div>
        @endforeach
        
        </div>
    </div>

    <x-footer />
</x-app-layout>
