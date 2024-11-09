<?php

namespace App\Http\Controllers;

use App\Facades\BookFacade;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Méthode pour créer un livre avec la façade
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'author' => 'required|string',
            'publication_date' => 'required|date',
            'nb_pages' => 'required|integer',
            'type' => 'required|string',
        ]);

        // Utiliser la façade pour créer le livre
        //factory est definit dans BookService
        $book = BookFacade::createBook($validated);

        return response()->json($book);
    }

    // Méthode pour mettre à jour un livre avec la façade
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'author' => 'required',
            'publication_date' => 'required|date',
            'nb_pages' => 'required|integer',
            'type' => 'required',
        ]);

        // Utiliser la façade pour mettre à jour le livre
        $book = BookFacade::updateBook($book, $request->all());

        return redirect()->route('books.index')->with('success', 'Livre mis à jour avec succès.');
    }

    // Méthode pour supprimer un livre avec la façade
    public function destroy(Book $book)
    {
        BookFacade::deleteBook($book);
        return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès.');
    }
}
