<?php
namespace App\Http\Controllers;

use App\DataTables\BooksDataTable;
use App\Models\Book;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookController extends Controller
{
    public function __construct()
    {
   
        $this->middleware('permission:add books')->only(['create', 'store']);
        $this->middleware('permission:edit books')->only(['edit', 'update']);
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function cards()
    {
        $books = Book::all();
        return view('books.cards', compact('books'));
    }

    public function exportPdf(Book $book)
    {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('books.pdf', compact('book'));
        return $pdf->download($book->title . '_details.pdf');
    }
}
