<?php

namespace App\Livewire;

use App\Models\Rombel;
use Livewire\Component;

class Rekap extends Component
{
    public $rombel;
    public function mount($rombel)
    {
        $this->rombel = $rombel;
    }

    public function render()
    {
        $nilai = [];
        $pelajaran = [];
        $santri = [];

        foreach (Rombel::nilaiRombel($this->rombel->id)->get() as $n) {
            $nilai[$n->santri_id][$n->pelajaran_id] = $n->nilai;
            $pelajaran[$n->pelajaran_id] = $n->pelajaran;
            $santri[$n->santri_id] = [
                $n->santri,
                $n->rombel,
                $n->semester,
                $n->ustadz,
                $n->tgl_rapor,
            ];
        }
        foreach ($nilai as $s => $p) {
            $nilai[$s]['total'] = array_sum($p);
        }
        $nilai = $this->array_sort($nilai, 'total', SORT_DESC);
        return view('livewire.rekap', [
            'nilai' => $nilai,
            'pelajaran' => $pelajaran,
            'santri' => $santri
        ]);
    }

    // https://www.php.net/manual/en/function.sort.php#99419
    private function array_sort($array, $on, $order = SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }
}
