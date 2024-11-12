<?php

namespace App\Http\Controllers;

use App\Facades\UserFacade;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserFacade::getAllUsers();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ]);

        $user = UserFacade::createUser($validated);

        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8',
            'role' => 'required|string|max:255',
        ]);

        $user = UserFacade::updateUser($user, $validated);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        UserFacade::deleteUser($user);

        return response()->json(['success' => 'User deleted successfully.']);
    }
}
