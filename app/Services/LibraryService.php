<?php

namespace App\Services;

use App\Models\Library;

class LibraryService
{
    public function createLibrary(array $data)
    {
        // Créer une nouvelle bibliothèque avec les données fournies
        return Library::create([
            'name' => $data['name'],
        ]);
    }

    public function updateLibrary(Library $library, array $data)
    {
        // Met à jour les informations de la bibliothèque
        $library->update($data);
        return $library;
    }

    public function deleteLibrary(Library $library)
    {
        // Supprime la bibliothèque de la base de données
        $library->delete();
    }

    public function getAllLibraries()
    {
        return Library::all();
    }
    public function getLibraryById(int $id)
    {
        return Library::findOrFail($id);
    }
}
