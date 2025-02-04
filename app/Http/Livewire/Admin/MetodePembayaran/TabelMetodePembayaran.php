<?php

namespace App\Http\Livewire\Admin\MetodePembayaran;

use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TabelMetodePembayaran extends Component
{
    public $metode_pembayaran;
    public $listeners = ["deleteAct" => 'delete']; //property untuk menangkap event dari emit component lain / dari frontend (js) secara global

    public function mount()
    {
        $this->metode_pembayaran = MetodePembayaran::all();
    }

    public function delete($id)
    {
        $metode_pembayaran = MetodePembayaran::find($id);
        $logo = $metode_pembayaran->logo;

        if ($metode_pembayaran) {
            $metode_pembayaran->delete();

            // Hapus file logo lama (use storage:link yang dihapus file di folder storagenya)
            Storage::delete("public/assets/pay-logo/" . $logo);
        }
    }

    public function render()
    {
        return view('livewire.admin.metode-pembayaran.tabel-metode-pembayaran');
    }
}
