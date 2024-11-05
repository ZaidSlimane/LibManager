<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Affiche une liste de livres
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider la demande
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'author' => 'required|string',
            'publication_date' => 'required|date',
            'nb_pages' => 'required|integer',
            'type' => 'required|string',
        ]);

        // Créer le type de livre avec la fabrique
        $bookType = BookFactory::create($validated['type']);

        // Créer le modèle Book en utilisant les informations de la requête
        $book = new Book();
        $book->name = $validated['name'];
        $book->category = $validated['category'];
        $book->author = $validated['author'];
        $book->publication_date = $validated['publication_date'];
        $book->nb_pages = $validated['nb_pages'];
        $book->type = $bookType->getType();

        // Enregistrer le livre
        $book->save();

        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Affiche un livre spécifique
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // Affiche le formulaire d'édition pour un livre
   public function edit(Book $book)
   {
       return view('books.edit', compact('book'));
   }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // Met à jour un livre existant dans la base de données
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

       $book->update($request->all());
       return redirect()->route('books.index')->with('success', 'Livre mis à jour avec succès.');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 // Supprime un livre de la base de données
 public function destroy(Book $book)
 {
     $book->delete();
     return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès.');
 }
}
