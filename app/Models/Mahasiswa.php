<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswas';
    protected $fillable =[
        'nama',
        'nim',
        'prodi',
        'semester',
        'ttl-tempat',
        'ttl-tanggal',
        'gpa',
        'prestasi_akademik',
        'prestasi_non',
        'pendapatan_ortu',
        'tanggungan',
        

    ];
}
