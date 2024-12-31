<?php

namespace App\Http\Livewire\Admin\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormAdmin extends Component
{
    public $admin;

    // property untuk form sesuai wire:model
    public $nama, $email, $password, $konfirmasi_password;

    public function mount($admin = null)
    {
        $this->admin = $admin;

        // set data ke form untuk edit
        if ($admin != null) {
            $this->nama = $admin->nama;
            $this->email = $admin->email;
        }
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'nullable|min:6',
            'konfirmasi_password' => 'required|same:password',
        ]);

        $admin = new User();
        $admin->nama = $this->nama;
        $admin->email = $this->email;
        $admin->password = Hash::make($this->password);
        $admin->save();

        if ($admin) {
            return redirect()->route('admin.index')->with("status", "success")->with('msg', 'Data berhasil disimpan');
        } else {
            return redirect()->back();
        }
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->admin->id,
            'password' => 'nullable|min:6',
        ]);

        $admin = User::find($this->admin->id);
        $admin->nama = $this->nama;
        $admin->email = $this->email;
        if ($this->password) {
            $admin->password = Hash::make($this->password);
        }
        $admin->save();

        if ($admin) {
            return redirect()->route('admin.index')->with("status", "success")->with('msg', 'Data berhasil diupdate');
        } else {
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.admin.admin.form-admin');
    }
}
