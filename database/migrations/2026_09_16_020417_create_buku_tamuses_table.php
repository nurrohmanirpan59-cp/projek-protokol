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
        Schema::create('buku_tamuses', function (Blueprint $table) {
            $table->id();// Primary key buku tamuses
            $table->date('tanggal_kunjungan');
            $table->string('nama_tamu');
            $table->string('instansi_asal');
            
            // Foreign Key ke tabel divisis
            $table->foreignId('divisi_tujuan_id')
                  ->constrained('divises')
                  ->onDelete('cascade');
                  
            // Foreign Key ke tabel pegawais (nullable jika pegawai tujuan opsional)
            $table->foreignId('pegawai_tujuan_id')
                  ->nullable()
                  ->constrained('pegawais')
                  ->onDelete('set null');
                  
            $table->text('maksud_tujuan');
            
            // Status menggunakan enum
            $table->enum('status', ['menunggu', 'diterima', 'selesai'])
                  ->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_tamuses');
    }
};
