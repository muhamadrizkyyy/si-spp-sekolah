<?php

namespace App\Http\Livewire\Admin\TahunAjaran;

use App\Models\TahunAjaran;
use Livewire\Component;

class FormTahunAjaran extends Component
{
    public $tahunajaran;

    // property untuk form sesuai wire:model
    public $thn_ajaran, $jumlah_spp;

    public function mount($tahunajaran = null)
    {
        $this->tahunajaran = $tahunajaran;

        // set data ke form untuk edit
        if ($this->tahunajaran != null) {
            $this->thn_ajaran = $this->tahunajaran->thn_ajaran;
            $this->jumlah_spp = $this->tahunajaran->jumlah_spp;
        }
    }

    public function store()
    {
        $this->validate([
            'thn_ajaran' => 'required',
            'jumlah_spp' => 'required',
        ]);

        $tahunAjaran = TahunAjaran::create([
            'thn_ajaran' => $this->thn_ajaran,
            'jumlah_spp' => $this->jumlah_spp,
        ]);

        if ($tahunAjaran) {
            return redirect()->route('tahunAjaran.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }

    public function update()
    {
        $this->validate([
            'thn_ajaran' => 'required',
            'jumlah_spp' => 'required',
        ]);

        $tahunAjaran = TahunAjaran::find($this->tahunajaran->id);
        $tahunAjaran->update([
            'thn_ajaran' => $this->thn_ajaran,
            'jumlah_spp' => $this->jumlah_spp,
        ]);

        if ($tahunAjaran) {
            return redirect()->route('tahunAjaran.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Data gagal diupdate');
        }
    }

    public function render()
    {
        return view('livewire.admin.tahun-ajaran.form-tahun-ajaran');
    }
}
