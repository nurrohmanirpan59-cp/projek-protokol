<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pegawais extends Model //Menentukan nama calas pada model 
{
    use HasFactory;

    protected $fillable = [
        'divisi_id',
        'nama',
        'nip',
    ];

    // Relasi: Seorang pegawai MILIK SATU divisi (N:1)
    public function divisi()
    {
        return $this->belongsTo(Divisis::class, 'divisi_id');
    }
}
