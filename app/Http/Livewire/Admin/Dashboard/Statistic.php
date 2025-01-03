<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Statistic extends Component
{
    public $countSiswa;
    public $countAdmin;
    public $bulanSekarang, $total_bayar;

    public function mount()
    {
        $this->countSiswa = Siswa::count();
        $this->countAdmin = User::count();

        $this->bulanSekarang = now()->format('F Y');
        $this->total_bayar = number_format(Pembayaran::whereMonth('created_at', now()->month)->sum('total_bayar'), 0, ",", ".");
    }

    public function render()
    {
        return view('livewire.admin.dashboard.statistic');
    }
}
