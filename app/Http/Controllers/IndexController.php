<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function view()
    {
        return view('index', [
            "title" => 'Home-page'
        ]);
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|min:4',
                'username' => 'required|max:255|min:4|unique:users',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255'
            ]);

            // $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create($validatedData);

            return redirect('/')->with('success', 'Registration was successful!');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangkap dan simpan pesan error pada session
            return redirect('/')->with('error', 'Registration was failed due to: ' . $e->getMessage());
        }
    }
}
