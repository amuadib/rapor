<?php

namespace App\Services;

class SantriService
{
    public function getUrutanNIS()
    {
        $terakhir = \DB::select('SELECT CAST(nis AS UNSIGNED) AS urutan FROM santri ORDER BY urutan DESC LIMIT 1');
        if (!count($terakhir)) {
            return '001';
        }
        return str_pad($terakhir[0]->urutan + 1, 3, '0', STR_PAD_LEFT);
    }
}
