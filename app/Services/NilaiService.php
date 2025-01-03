<?php

namespace App\Services;

class NilaiService
{
    // https://gist.github.com/cahsowan/d315d54a59e4f14a6bab
    public function terbilang(string|int $x): string
    {
        $x = intval($x);
        $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

        if ($x < 12)
            return " " . $angka[$x];
        elseif ($x < 20)
            return $this->terbilang($x - 10) . " belas";
        elseif ($x < 100)
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
        elseif ($x < 200)
            return "seratus" . $this->terbilang($x - 100);
        elseif ($x < 1000)
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
        elseif ($x < 2000)
            return "seribu" . $this->terbilang($x - 1000);
        elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
        elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
    }

    public function predikat(string|int $angka): string
    {
        $angka = intval($angka);
        if ($angka >= 90) {
            return 'Sangat Baik';
        } elseif ($angka >= 80 and $angka < 90) {
            return 'Baik';
        } elseif ($angka > 70 and $angka < 80) {
            return 'Cukup';
        } else {
            return 'Kurang';
        }
    }
}
