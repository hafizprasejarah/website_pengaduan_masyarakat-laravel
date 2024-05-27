<?php

namespace App\Http\Controllers;

use App\Models\Lapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DaftarLaporanController extends Controller
{
    /**user controller */

    public function daftar()
    {
        return view('/daftarlaporan', [
            "title" => 'daftarlaporan',
            'lapors' => Lapor::where('user_id',Auth::id())->latest()->paginate(4)
        ]);
    }

    /**
     * petugas controller
     */
    public function petugasdaftar()
    {
        return view('/petugas/daftarlaporan', [
            "title" => 'daftarlaporan',
            'directory' => '/petugas',
            'lapors' => Lapor::latest()->paginate(4)
        ]);
    }
    /**admin controller */
    public function admindaftar()
    {
        return view('/administrasi/daftarlaporan', [
            "title" => 'daftarlaporan',
            'directory' => '/administrasi',
            'lapors' => Lapor::latest()->paginate(4)
                
        ]);
    }

    public function store_lapor(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:lapors',
            'perihal' => 'required|max:255',
            'bukti' => 'image|file|max:10240',
            'lapor' => 'required',
            'alamat' => 'required',
        ]);

        if ($request->file('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('post-images');
        }

        $data['user_id'] = auth()->user()->id;


        Lapor::create($data);
        return redirect('/administrasi/dashboard')->with('success', 'added the report!');
    }

    public function store_lapor_user(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:lapors',
            'perihal' => 'required|max:255',
            'bukti' => 'image|file|max:10240',
            'lapor' => 'required',
            'alamat' => 'required',
        ]);

        if ($request->file('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('post-images');
        }

        $data['user_id'] = auth()->user()->id;


        Lapor::create($data);
        return redirect('/dashboard')->with('success', 'added the report!');
    }


    public function destroy(Lapor $lapor)
    {
        if ($lapor->bukti) {
            unlink('storage/' .$lapor->bukti);
        }
        Lapor::destroy($lapor->id);
        
        return redirect('/administrasi/daftarlaporan')->with('success', 'delete the report!');
    }

    public function destroypetugas(Lapor $lapor)
    {
        if ($lapor->bukti) {
            unlink('storage/' .$lapor->bukti);
        }
        Lapor::destroy($lapor->id);
        
        return redirect('/petugas/daftarlaporan')->with('success', 'delete the report!');
    }
}
