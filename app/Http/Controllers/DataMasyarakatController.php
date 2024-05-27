<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataMasyarakatController extends Controller
{

    /**user controller */
    public function masyarakatdata()
    {
    
        return view('/administrasi/data-masyarakat', [
            "title" => 'data-masyarakat',
            'directory' => '/administrasi',
            'users' => User::where('role', 'user')->filter(request(['search']))->latest()->paginate(4)
        ]);
    }

    /**
     * petugas controller
     */
    public function petugasdata()
    {
        return view('/administrasi/data-petugas', [
            "title" => 'data-petugas',
            'directory' => '/administrasi',
            'users' => User::where('role', 'petugas')->latest()->paginate(4)

        ]);
    }
    /**admin controller */


    public function edit(User $user)
    {
        return view('/administrasi/edit', [
            "title" => 'data-masyarakat',
            'directory' => '/administrasi',
            'users' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {

        $validatedData = ([
            'name' => 'required|max:255|min:4',
            'role' => 'required'
        ]);

        if ($request->username != $user->username) {
            $validatedData['username'] = 'required|max:255|min:4|unique:users';
        }

        if ($request->email != $user->email) {
            $validatedData['email'] = 'required|email:dns|unique:users';
        }
        $validatedData2 = $request->validate($validatedData);


        User::where('id', $user->id)
            ->update($validatedData2);

        if ($user->role == 'user') {

            return redirect('/administrasi/data-masyarakat')->with('success', 'user updated');
        } else if ($user->role == 'petugas') {
            return redirect('/administrasi/data-petugas')->with('success', 'user  updated');
        }
    }
    public function destroyuser(User $user)
    {
        User::destroy($user->id);
        if ($user->role == 'user') {

            return redirect('/administrasi/data-masyarakat')->with('success', 'user deleted');
        } else if ($user->role == 'petugas') {
            return redirect('/administrasi/data-petugas')->with('success', 'user deleted');
        }
    }
}
