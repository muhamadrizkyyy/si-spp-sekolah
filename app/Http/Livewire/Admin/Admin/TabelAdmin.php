<?php

namespace App\Http\Livewire\Admin\Admin;

use App\Models\User;
use Livewire\Component;

class TabelAdmin extends Component
{
    public function render()
    {
        $admin = User::all();
        return view('livewire.admin.admin.tabel-admin', compact("admin"));
    }
}
