<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kabupaten extends Model
{
    protected $table = 'kabupaten'; // Nama tabel kota

    protected $fillable = ['id', 'id_provinsi', 'nama']; // Kolom yang bisa diisi

    // Definisi relasi dengan tabel provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }
}