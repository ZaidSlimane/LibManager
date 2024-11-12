<?php

namespace App\Services;

use App\Models\Lend;
use Illuminate\Support\Facades\DB;

class LendService
{
    public function createLend(array $data)
    {
        return DB::transaction(function () use ($data) {
            $lend = Lend::create([
                'user_id' => $data['user_id'],
                'date' => $data['date'],
            ]);

            if (isset($data['books'])) {
                $lend->books()->attach($data['books']);
            }

            return $lend;
        });
    }

    public function updateLend(Lend $lend, array $data)
    {
        return DB::transaction(function () use ($lend, $data) {
            $lend->update($data);

            if (isset($data['books'])) {
                $lend->books()->sync($data['books']);
            }

            return $lend;
        });
    }

    public function deleteLend(Lend $lend)
    {
        $lend->books()->detach();
        $lend->delete();
    }

    public function getAllLends()
    {
        return Lend::all();
    }
}
