<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    //
    public function store(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string',
        'nim' => 'required|string',
        'prodi' => 'required|string',
        'semester' => 'required|string',
        'ttl_tempat' => 'required|string', // Pastikan konsisten dengan nama kolom di form
        'ttl_tanggal' => 'required|date',
        'prestasi_akademik' => 'required|in:internasional,nasional,provinsi,kampus,tidak_ada',
        'prestasi_non' => 'required|in:internasional,nasional,provinsi,kampus,tidak_ada',
        'gpa' => 'required|numeric|between:1.00,4.00',
        'pendapatan_ortu' => 'required|integer',
        'tanggungan' => 'required|integer',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
    }

    // Ambil data yang divalidasi
    $data = $validator->validated();

    // Simpan data ke database
    Mahasiswa::create($data);

    // Redirect ke route 'welcome' dengan pesan sukses
    return to_route('user.dashboard')->with('success', 'Anda berhasil mendaftar!');
}

public function pengumuman(){
    return view('pengumuman');
}

}
