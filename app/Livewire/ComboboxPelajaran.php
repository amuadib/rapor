<?php

namespace App\Livewire;

use App\Models\Pelajaran;
use App\Models\PelajaranRombel;
use Livewire\Component;
use Illuminate\Support\Arr;

class ComboboxPelajaran extends Component
{
    public $rombel;
    public $options = [];
    public $selected = [];

    public function mount($rombel)
    {
        $this->rombel = $rombel;
    }
    public function render()
    {
        $this->refreshData();
        return view('livewire.combobox-pelajaran');
    }
    public function move(int $id, string $to): void
    {
        if ($to == 'selected') {
            PelajaranRombel::insert([
                'rombel_id' => $this->rombel->id,
                'pelajaran_id' => $id,
                'keterangan' => ''
            ]);
        } elseif ($to == 'options') {
            PelajaranRombel::where('rombel_id', $this->rombel->id)
                ->where('pelajaran_id', $id)
                ->delete();
        }
        $this->refreshData();
    }

    private function refreshData(): void
    {
        foreach (Pelajaran::orderBy('nama')->get() as $p) {
            $this->options[$p->id] = $p->nama;
        }
        foreach (PelajaranRombel::where('rombel_id', $this->rombel->id)->get() as $p) {
            $this->selected[$p->pelajaran_id] = $p->mapel->nama;
            unset($this->options[$p->pelajaran_id]);
        }
    }
}
