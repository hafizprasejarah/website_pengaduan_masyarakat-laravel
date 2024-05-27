<?php

namespace App\Http\Controllers;

use App\Models\Lapor;
use App\Models\Comment;
use Illuminate\Http\Request;

class SingleLaporan extends Controller
{
    /**admin controller */
    public function single_report(lapor $lapor)
    {
        return view('/administrasi/single-laporan', [
            "title" => 'single-laporan',
            'directory' => '/administrasi',
            'lapor' => $lapor,
        ]);
    }

    public function petugas_single_report(lapor $lapor)
    {
        return view('/petugas/single-laporan', [
            "title" => 'single-laporan',
            'directory' => '/petugas',
            'lapor' => $lapor,
        ]);
    }

    public function user_single_report(lapor $lapor)
    {
        return view('/single-laporan', [
            "title" => 'single-laporan',
            'directory' => '/petugas',
            'lapor' => $lapor,
        ]);
    }

    public function validasi(Request $request, lapor $lapor)
    {

        $validasi = $request->query('newValue');
        $laporId = $lapor->id; // Sesuaikan dengan input yang sesuai

        // Validasi hanya boleh 0 atau 1
        if ($validasi !== '0' && $validasi !== '1') {
            return response()->json(['error' => 'Nilai validasi tidak valid. Hanya boleh 0 atau 1.']);
        }

        // Memanggil fungsi updateValidasi dari model Lapor
        $result = lapor::where('id', $laporId)
            ->update(['validasi' => $validasi]);

        if ($result) {
            return response()->json(['success' => 'Nilai validasi berhasil diubah.', 'result' => $result]);
        } else {
            return response()->json(['error' => 'Gagal mengubah nilai validasi. Laporan tidak ditemukan.', 'result' => $result]);
        }
    }

    public function komentar(Request $request, Lapor $lapor)
    {
        // dd($lapor,$request);
        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['lapor_id'] = $lapor->id;

        Comment::create($validatedData);
        return redirect('/administrasi/daftarlaporan/' . $lapor->slug);
    }






    public function petugasvalidasi(Request $request, lapor $lapor)
    {

        $validasi = $request->query('newValue');
        $laporId = $lapor->id; // Sesuaikan dengan input yang sesuai

        // Validasi hanya boleh 0 atau 1
        if ($validasi !== '0' && $validasi !== '1') {
            return response()->json(['error' => 'Nilai validasi tidak valid. Hanya boleh 0 atau 1.']);
        }

        // Memanggil fungsi updateValidasi dari model Lapor
        $result = lapor::where('id', $laporId)
            ->update(['validasi' => $validasi]);

        if ($result) {
            return response()->json(['success' => 'Nilai validasi berhasil diubah.', 'result' => $result]);
        } else {
            return response()->json(['error' => 'Gagal mengubah nilai validasi. Laporan tidak ditemukan.', 'result' => $result]);
        }
    }

    public function petugaskomentar(Request $request, Lapor $lapor)
    {
        // dd($lapor,$request);
        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['lapor_id'] = $lapor->id;

        Comment::create($validatedData);
        return redirect('/petugas/daftarlaporan/' . $lapor->slug);
    }
}
