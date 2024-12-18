<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function updateUser(User $user, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        $user->update($data);
        return $user;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function findUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function getAllUsers()
    {
        return User::all();
    }


    public function fetchUserByInterest(string $interest)
    {
        return User::whereJsonContains('interests', $interest)->get();
    }
}
