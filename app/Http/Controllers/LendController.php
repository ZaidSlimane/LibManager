<?php

namespace App\Http\Controllers;

use App\Facades\LendFacade;
use App\Models\Lend;
use Illuminate\Http\Request;

class LendController extends Controller
{
    public function index()
    {
        $lends = LendFacade::getAllLends();
        return response()->json($lends);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'books' => 'array|exists:books,id',
        ]);

        $lend = LendFacade::createLend($validated);

        return response()->json($lend);
    }

    public function update(Request $request, Lend $lend)
    {
        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'date' => 'date',
            'books' => 'array|exists:books,id',
        ]);

        $lend = LendFacade::updateLend($lend, $validated);

        return response()->json($lend);
    }

    public function destroy(Lend $lend)
    {
        LendFacade::deleteLend($lend);

        return response()->json(['success' => 'Lend deleted successfully.']);
    }
}
