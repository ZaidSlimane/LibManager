<?php

namespace App\Http\Controllers;

use App\Facades\LendFacade;
use App\Models\Lend;
use Illuminate\Http\Request;

class LendController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'books' => 'array',
            'books.*' => 'exists:books,id',
        ]);

        $lend = LendFacade::createLend($validated);

        return response()->json($lend);
    }

    public function update(Request $request, Lend $lend)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'books' => 'array',
            'books.*' => 'exists:books,id',
        ]);

        $lend = LendFacade::updateLend($lend, $validated);

        return redirect()->route('lends.index')->with('success', 'Prêt mis à jour avec succès.');
    }

    public function destroy(Lend $lend)
    {
        LendFacade::deleteLend($lend);

        return redirect()->route('lends.index')->with('success', 'Prêt supprimé avec succès.');
    }
}
