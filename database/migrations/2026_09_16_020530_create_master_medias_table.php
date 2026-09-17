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
        Schema::create('master_medias', function (Blueprint $table) {
            $table->id();
            $table->string('nama_media');
            $table->string('jenis_media'); // Contoh: Cetak, Online, TV, Radio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_medias');
    }
};
