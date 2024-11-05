<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Affiche une liste de fournisseurs
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'email' => 'required|string|email|max:255|unique:suppliers',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'commercial_register_number' => 'required|string|unique:suppliers',
        ]);

        // Créer et enregistrer le fournisseur
        $supplier = Supplier::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Chiffrement du mot de passe
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'commercial_register_number' => $validated['commercial_register_number'],
        ]);

        return response()->json($supplier);
    }

    /**
     * Display the specified resource.
     *
     * @param  Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    // Affiche un fournisseur spécifique
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    // Affiche le formulaire d'édition pour un fournisseur
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    // Met à jour un fournisseur existant dans la base de données
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'commercial_register_number' => 'required|string|unique:suppliers,commercial_register_number,' . $supplier->id,
        ]);

        // Met à jour les informations du fournisseur
        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Fournisseur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    // Supprime un fournisseur de la base de données
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Fournisseur supprimé avec succès.');
    }
}
