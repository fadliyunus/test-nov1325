<?php

namespace App\Models;

use App\Models\mataPelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    protected $table = "guru";


    protected $fillable = [
        'nip',
        'nm_guru',
        'jns_kelamin',
        'mpelajaran_id',
        'usia',
        'no_telp',
        'alamat',
    ];

    // public function matapelajaran()
    // {
    //     return $this->hasMany(mataPelajaran::class, 'mpelajaran_id', 'mpelajaran_id');
    // }
}
