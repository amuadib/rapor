<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaRombel extends Model
{
    protected $table = "anggota_rombel";

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id');
    }
}
