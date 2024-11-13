<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";


    protected $fillable = [
        'nis',
        'nm_siswa',
        'jns_kelamin',
        'tgl_lahir',
        'agama',
        'nm_ayah',
        'nm_ibu',
        'usia',
        'alamat',
    ];
}
