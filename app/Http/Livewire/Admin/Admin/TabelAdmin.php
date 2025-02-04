<?php

namespace App\Http\Livewire\Admin\Admin;

use App\Models\User;
use Livewire\Component;

class TabelAdmin extends Component
{
    public $listeners = ["deleteAct" => 'delete']; //property untuk menangkap event dari emit component lain / dari frontend (js) secara global

    public function delete($value)
    {
        $admin = User::find($value);
        if ($admin) {
            $admin->delete();
        }
    }

    public function render()
    {
        $admin = User::all();
        return view('livewire.admin.admin.tabel-admin', compact("admin"));
    }
}
