<?php

namespace App\Http\Livewire\Admin\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class FormJurusan extends Component
{
    public $jurusan;

    // property untuk form sesuai wire:model
    public $kode_jurusan;

    public function mount($jurusan = null)
    {
        $this->jurusan = $jurusan;
        $this->kode_jurusan = $jurusan ? $jurusan->kode_jurusan : null;
    }

    public function store()
    {
        $this->validate([
            'kode_jurusan' => "required"
        ]);

        $jurusan = Jurusan::create([
            'kode_jurusan' => $this->kode_jurusan
        ]);

        if ($jurusan) {
            return redirect()->route('jurusan.index')->with("status", "success")->with('msg', 'Data berhasil disimpan');
        } else {
            return redirect()->back();
        }
    }

    public function update()
    {
        $this->validate([
            'kode_jurusan' => "required"
        ]);

        $jurusan = Jurusan::find($this->jurusan->id);
        $jurusan->update([
            'kode_jurusan' => $this->kode_jurusan
        ]);

        if ($jurusan) {
            return redirect()->route('jurusan.index')->with("status", "success")->with('msg', 'Data berhasil diupdate');
        } else {
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.admin.jurusan.form-jurusan');
    }
}
