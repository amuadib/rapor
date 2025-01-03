<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiPelajaranRombel extends Model
{
    protected $table = "nilai_pelajaran_rombel";

    public function pelajaran_rombel()
    {
        return $this->belongsTo(PelajaranRombel::class, 'pelajaran_rombel_id');
    }
    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
}
