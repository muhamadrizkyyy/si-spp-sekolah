<?php

namespace App\Http\Livewire\Admin\MetodePembayaran;

use App\Models\MetodePembayaran;
use Livewire\Component;

class TabelMetodePembayaran extends Component
{
    public $metode_pembayaran;

    public function mount()
    {
        $this->metode_pembayaran = MetodePembayaran::all();
    }

    public function delete($id)
    {
        $metode_pembayaran = MetodePembayaran::find($id);
        if ($metode_pembayaran) {
            $metode_pembayaran->delete();
        }
    }

    public function render()
    {
        return view('livewire.admin.metode-pembayaran.tabel-metode-pembayaran');
    }
}
