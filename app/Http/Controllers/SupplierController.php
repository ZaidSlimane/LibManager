<?php

namespace App\Http\Controllers;

use App\Facades\SupplierFacade;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = SupplierFacade::getAllSuppliers();
        return response()->json($suppliers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers',
            'password' => 'required|string|min:8',
        ]);

        $supplier = SupplierFacade::createSupplier($validated);

        return response()->json($supplier);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:suppliers,email,' . $supplier->id,
        ]);

        $supplier = SupplierFacade::updateSupplier($supplier, $validated);

        return response()->json($supplier);
    }

    public function destroy(Supplier $supplier)
    {
        SupplierFacade::deleteSupplier($supplier);

        return response()->json(['success' => 'Supplier deleted successfully.']);
    }
    public function show($id)
    {
        $supplier = SupplierFacade::getSupplierById($id);
        return response()->json($supplier);
    }
}
