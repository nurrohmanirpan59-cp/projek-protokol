<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class divisis extends Model
{
    use HasFactory;

    // Sesuaikan nama tabel jika di migration menggunakan 'divises'
    protected $table = 'divises'; 

    protected $fillable = [
        'nama_divisi',
    ];

    // Relasi: Satu divisi memiliki BANYAK pegawai (1:N)
    public function pegawais()
    {
        return $this->hasMany(pegawais::class, 'divisi_id');
    }

    
}
