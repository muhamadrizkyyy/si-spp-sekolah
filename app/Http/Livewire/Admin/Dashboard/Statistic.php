<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Siswa;
use App\Models\User;
use Livewire\Component;

class Statistic extends Component
{
    public $countSiswa;
    public $countAdmin;

    public function mount()
    {
        $this->countSiswa = Siswa::count();
        $this->countAdmin = User::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.statistic');
    }
}
