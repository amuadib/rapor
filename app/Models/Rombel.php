<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = "rombel";

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    public function ustadz()
    {
        return $this->belongsTo(Ustadz::class, 'ustadz_id');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaRombel::class, 'rombel_id', 'id');
    }

    public function pelajaran()
    {
        return $this->hasMany(PelajaranRombel::class, 'rombel_id', 'id');
    }
    public function scopeNilaiRombel($query, $rombel_id)
    {
        return $query
            ->join('pelajaran_rombel', 'pelajaran_rombel.rombel_id', '=', 'rombel.id')
            ->join('pelajaran', 'pelajaran_rombel.pelajaran_id', '=', 'pelajaran.id')
            ->join('nilai_pelajaran_rombel', 'nilai_pelajaran_rombel.pelajaran_rombel_id', '=', 'pelajaran_rombel.id')
            ->join('santri', 'nilai_pelajaran_rombel.santri_id', '=', 'santri.id')
            ->join('ustadz', 'rombel.ustadz_id', '=', 'ustadz.id')
            ->join('semester', 'rombel.semester_id', '=', 'semester.id')
            ->where('rombel.id', $rombel_id)
            ->select(
                'santri.id as santri_id',
                'santri.nama as santri',
                'rombel.nama as rombel',
                'ustadz.nama as ustadz',
                'semester.nama as semester',
                'semester.tgl_rapor',
                'pelajaran.nama as pelajaran',
                'pelajaran.id as pelajaran_id',
                'nilai'
            );
    }
}
