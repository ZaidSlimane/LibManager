<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Factories\BookFactory;



class BookService
{
    public function createBook(array $data)
    {
        // Créer le type de livre avec la fabrique
        $bookType = BookFactory::create($data['type']);

        // Créer le modèle Book
        $book = new Book();
        $book->name = $data['name'];
        $book->category = $data['category'];
        $book->author = $data['author'];
        $book->publication_date = $data['publication_date'];
        $book->nb_pages = $data['nb_pages'];
        $book->type = $bookType->getType();

        try {
            $book->save();
        } catch (\Exception $e) {
            \Log::error("Error saving book: " . $e->getMessage());
            return response()->json(['error' => 'Could not save book'], 500);
        }
    }

    public function updateBook(Book $book, array $data)
    {
        $book->update($data);
        return $book;
    }

    public function deleteBook(Book $book)
    {
        $book->delete();
    }

    public function getAllBooks()
    {
        return Book::all();
    }
    public function getBookById(int $id)
    {
        return Book::findOrFail($id);
    }
}
