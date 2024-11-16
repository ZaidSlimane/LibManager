<?php

namespace App\Http\Controllers;

use App\Facades\BookFacade;
use Illuminate\Http\Request;
use App\Factories\BookFactory;



class BookController extends Controller
{
    public function index()
    {
        $books = BookFacade::getAllBooks();
        return response()->json($books);
    }

    public function store(Request $request)
    {
       echo("Initialize the creation");

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'nb_pages' => 'required|integer',
            'type' => 'required|string',
        ]);

        $book = BookFacade::createBook($validated);

        return response()->json($book);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'nb_pages' => 'required|integer',
            'type' => 'required|string',
        ]);

        $book = BookFacade::updateBook($book, $validated);

        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        BookFacade::deleteBook($book);

        return response()->json(['success' => 'Book deleted successfully.']);
    }
    public function show($id)
    {
        $book = BookFacade::getBookById($id);
        return response()->json($book);
    }

}
