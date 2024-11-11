<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        return Library::all();
    }

    public function store(Request $request)
    {
        $library = Library::create($request->all());
        return response()->json($library, 201);
    }

    public function show($id)
    {
        return Library::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $library = Library::findOrFail($id);
        $library->update($request->all());
        return response()->json($library, 200);
    }

    public function destroy($id)
    {
        Library::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}