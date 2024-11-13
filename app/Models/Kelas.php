<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";


    protected $fillable = [
        'nm_kelas',
        'siswa_id',
        'guru_id',
    ];
}
