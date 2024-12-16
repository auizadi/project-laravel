<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        
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
                (calcGpa($mahasiswa->gpa)* $bobot_main['gpa'])+//0.161)+
                (calcPrestasiAkademik($mahasiswa->prestasi_akademik)*  $bobot_main['prestasi_akademik'])+//0.099 )+
                (calcPrestasiNon($mahasiswa->prestasi_non)* $bobot_main['prestasi_non'])+ //0.062)+ 
                (calcPendapatanOrtu($mahasiswa->pendapatan_ortu)*  $bobot_main['pendapatan_ortu'])+//0.416)+
                (calcTanggungan($mahasiswa->tanggungan)*  $bobot_main['tanggungan'])//0.262 )
            );
        }

        $mahasiswas = $mahasiswas->sortByDesc('score');
        return view ('dashboard', compact('mahasiswas'));
    }

    public function show($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        return view('aksiAdmin', compact('mahasiswa'));

    }
}
