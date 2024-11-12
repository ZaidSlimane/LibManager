<?php

namespace App\Http\Controllers;

use App\Facades\LibraryFacade;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = LibraryFacade::getAllLibraries();
        return response()->json($libraries);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $library = LibraryFacade::createLibrary($validated);

        return response()->json($library);
    }

    public function update(Request $request, Library $library)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
        ]);

        $library = LibraryFacade::updateLibrary($library, $validated);

        return response()->json($library);
    }

    public function destroy(Library $library)
    {
        LibraryFacade::deleteLibrary($library);

        return response()->json(['success' => 'Library deleted successfully.']);
    }
    public function show($id)
    {
        $library = LibraryFacade::getLibraryById($id);
        return response()->json($library);
    }
}
