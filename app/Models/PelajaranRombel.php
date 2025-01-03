<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelajaranRombel extends Model
{
    protected $table = "pelajaran_rombel";

    public function mapel()
    {
        return $this->belongsTo(Pelajaran::class, 'pelajaran_id');
    }
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id');
    }
}
