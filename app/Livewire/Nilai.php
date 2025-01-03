<?php

namespace App\Livewire;

use App\Models\NilaiPelajaranRombel;
use Livewire\Component;
use Filament\Notifications\Notification;

class Nilai extends Component
{
    public $rombel;
    public $nilai = [];
    protected $rules = [
        'nilai.*.*' => 'required|numeric|min:0|max:100'
    ];

    public function mount($rombel)
    {
        $this->rombel = $rombel;
    }

    public function render()
    {
        $pelajaran = [];
        foreach ($this->rombel->anggota as $a) {
            foreach ($this->rombel->pelajaran as $p) {
                $this->nilai[$p->id][$a->santri_id] = '0';
                $pelajaran[] = $p->id;
            }
        }

        foreach (NilaiPelajaranRombel::whereIn('pelajaran_rombel_id', $pelajaran)->get() as $n) {
            $this->nilai[$n->pelajaran_rombel_id][$n->santri_id] = $n->nilai;
        }
        return view('livewire.nilai');
    }
    public function simpan()
    {
        $this->validate();
        foreach ($this->nilai as $r => $santri) {
            foreach ($santri as $id => $nilai) {
                NilaiPelajaranRombel::updateOrCreate(
                    [
                        'pelajaran_rombel_id' => $r,
                        'santri_id' => $id,
                    ],
                    [
                        'nilai' => $nilai
                    ]
                );
            }
        }
        Notification::make()
            ->title('Nilai berhasil disimpan')
            ->success()
            ->send();
    }
}
