<?php

namespace App\Services;

use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;

class SupplierService
{
    public function createSupplier(array $data)
    {
        $data['password'] = Hash::make($data['password']); // Chiffrement du mot de passe
        return Supplier::create($data);
    }

    public function updateSupplier(Supplier $supplier, array $data)
    {
        $supplier->update($data);
        return $supplier;
    }

    public function deleteSupplier(Supplier $supplier)
    {
        $supplier->delete();
    }

    public function getAllSuppliers()
    {
        return Supplier::all();
    }
}
