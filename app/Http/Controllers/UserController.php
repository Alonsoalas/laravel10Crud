<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //Metodo Index para listar los Usuarios
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    // Metodo Store para almacenar los nuevos usuarios en la DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

//        User::create($user);
        return view('users.index')->with('status', 'User created successfully!');

    }

    public function edit(User $user)
    {
//        return $user;
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return to_route('users.index')->with('status', __('User updated successfully!'));

    }

    public function destroy(User $user)
    {
        $user = User::destroy($user);
        return view('users.index')->with('status', 'User deleted successfully!');
    }
}
