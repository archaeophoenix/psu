<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->toArray();

        return view('User.index', [
            'description' => 'Selamat datang di Pengguna PSU',
            'title' => 'Artikel',
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('User.create', [
            'description' => 'Selamat datang di Form Artikel PSU',
            'title' => 'Form Artikel'
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('User.edit', [
            'title' => 'Selamat datang di Form Edit Artikel PSU',
            'description' => 'Perbarui data artikel',
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->role = 'admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $$request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->role = 'admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.index')->with('success', 'User Updated successfully.');
    }
}
