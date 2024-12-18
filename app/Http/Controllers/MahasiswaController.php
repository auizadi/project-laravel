<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

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

public function pengumuman(Request $request, $id=null){
    $jumlah_penerima = Setting::where('key', 'jumlah_penerima_beasiswa')->value('value');
    $mahasiswas = Mahasiswa::all();
    $bobot_main = [
        'gpa' => 0.161,
        'prestasi_akademik' => 0.099,
        'prestasi_non' => 0.062,
        'pendapatan_ortu' => 0.416,
        'tanggungan' => 0.262,
    ];
    
    // fungsi hitung GPA
    function calcGpa($gpa){
        if($gpa > 3.75){
            return 1;
        }elseif($gpa <= 3.75){
            return 0.509;
        }elseif($gpa <= 3.50){
            return 0.312;
        }elseif($gpa <= 3.25){
            return 0.186;
        }elseif($gpa < 3.00){
            return 0.144;
        }else{
            return 0.161;
        }
    }

    // fungsi hitung GPA
    function calcPrestasiAkademik($prestasi_akademik){
        if($prestasi_akademik == 'internasional'){
            return 1;
        }elseif($prestasi_akademik == 'nasional'){
            return 0.694;
        }elseif($prestasi_akademik == 'provinsi'){
            return 0.445;
        }elseif($prestasi_akademik == 'kampus'){
            return 0.310;
        }elseif($prestasi_akademik == 'tidak_ada'){
            return 0.190;
        }else{
            return 0.099;
        }
    }

    // fungsi hitung GPA
    function calcPrestasiNon($prestasi_non){
        if($prestasi_non == 'internasional'){
            return 1;
        }elseif($prestasi_non == 'nasional'){
            return 0.545;
        }elseif($prestasi_non == 'provinsi'){
            return 0.216;
        }elseif($prestasi_non == 'kampus'){
            return 0.139;
        }elseif($prestasi_non == 'tidak_ada'){
            return 0.104;
        }else{
            return 0.062;
        }
    }

    // fungsi hitung GPA
    function calcPendapatanOrtu($pendapatan_ortu){
        if($pendapatan_ortu <= 1500000){
            return 1;
        }elseif($pendapatan_ortu <= 2000000){
            return 0.604;
        }elseif($pendapatan_ortu <= 2500000){
            return 0.347;
        }elseif($pendapatan_ortu <= 3000000){
            return 0.147;
        }elseif($pendapatan_ortu > 3000000){
            return 0.095;
        }else{
            return 0.416;
        }
    }

    // fungsi hitung GPA
    function calcTanggungan($tanggungan){
        if($tanggungan > 5){
            return 1;
        }elseif($tanggungan == 5){
            return 0.471;
        }elseif($tanggungan == 4){
            return 0.335;
        }elseif($tanggungan == 3){
            return 0.186;
        }elseif($tanggungan <= 2){
            return 0.093;
        }else{
            return 0.262;
        }
    }

    // perhitungan
    foreach($mahasiswas as $mahasiswa){
        $mahasiswa->score = (
            (calcGpa($mahasiswa->gpa)* $bobot_main['gpa'])+ //0.161)+
            (calcPrestasiAkademik($mahasiswa->prestasi_akademik)*  $bobot_main['prestasi_akademik'])+ //0.099 )+
            (calcPrestasiNon($mahasiswa->prestasi_non)* $bobot_main['prestasi_non'])+ //0.062)+ 
            (calcPendapatanOrtu($mahasiswa->pendapatan_ortu)*  $bobot_main['pendapatan_ortu'])+ //0.416)+
            (calcTanggungan($mahasiswa->tanggungan)*  $bobot_main['tanggungan']) //0.262 )
        );
    }

    $mahasiswas = $mahasiswas->sortByDesc('score')->take($jumlah_penerima);
    if ($request->has('download') && $request->download === 'pdf' && $id) {
        $mahasiswas = Mahasiswa::findOrFail($id);
        $mahasiswas->score = (
            (calcGpa($mahasiswa->gpa)* $bobot_main['gpa'])+ //0.161)+
            (calcPrestasiAkademik($mahasiswa->prestasi_akademik)*  $bobot_main['prestasi_akademik'])+ //0.099 )+
            (calcPrestasiNon($mahasiswa->prestasi_non)* $bobot_main['prestasi_non'])+ //0.062)+ 
            (calcPendapatanOrtu($mahasiswa->pendapatan_ortu)*  $bobot_main['pendapatan_ortu'])+ //0.416)+
            (calcTanggungan($mahasiswa->tanggungan)*  $bobot_main['tanggungan']) //0.262 )
        );

        $pdf = Pdf::loadView('pdf.cetakBukti', ['mahasiswas' => $mahasiswas]);
        return $pdf->stream('bukti_penerima_beasiswa_'.$mahasiswa->nama.'.pdf');
    }
    return view('pengumuman', compact('mahasiswas', 'jumlah_penerima'));
}


}
