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
        Schema::create('rekap_medias', function (Blueprint $table) {
            $table->id();
            // Foreign Key (FK) mengarah ke tabel master_medias
            $table->foreignId('media_id')
                  ->constrained('master_medias')
                  ->onDelete('cascade');
                  
            $table->string('judul_berita');
            
            // Sentimen berita (contoh: Positif, Netral, Negatif)
            $table->string('sentimen'); // Bisa disesuaikan jadi enum jika nilainya tetap
            
            $table->string('file_kliping')->nullable(); // Menyimpan path/nama file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_medias');
    }
};
