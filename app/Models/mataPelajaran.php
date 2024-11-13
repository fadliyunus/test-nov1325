<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class mataPelajaran extends Model
{
    protected $table = "mata_pelajaran";

    protected $fillable = [
        'nm_matapelajaran',
        'jurusan'
    ];

    // public function guru()
    // {
    //     return $this->belongsTo(Guru::class, 'mpelajaran_id');
    // }


}
