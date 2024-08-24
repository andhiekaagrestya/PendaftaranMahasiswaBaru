<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MFormulir extends Model
{
    use HasFactory;
    protected $table = 'formulir';
    protected $fillable = ['id_users', 'nama', 'alamat_ktp', 'alamat_sekarang', 'provinsi', 'kabupaten', 'kecamatan', 'no_hp', 'email', 'kewarganegaraan', 'tanggal_lahir', 'provinsi_lahir', 'kabupaten_lahir', 'tempat_lahir', 'jenis_kelamin', 'status_menikah', 'agama', 'foto', 'tempat_lahir_wna', 'negara_wna']; // Kolom yang bisa diisi

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}