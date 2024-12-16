<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('prodi');
            $table->string('semester');
            $table->string('ttl_tempat')->nullable()->default(null)->change();
            $table->date('ttl_tanggal')->nullable()->default(null)->change();
            $table->float('gpa');
            $table->enum('prestasi_akademik', ['internasional','nasional','provinsi','kampus','tidak_ada']);
            $table->enum('prestasi_non', ['internasional','nasional','provinsi','kampus','tidak_ada']);
            $table->integer('pendapatan_ortu');
            $table->integer('tanggungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
