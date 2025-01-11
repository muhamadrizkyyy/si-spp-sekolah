<?php

namespace App\Http\Livewire\Auth;

use App\Models\identitasWeb;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $logo;

    public function mount()
    {
        $this->logo = identitasWeb::first()->logo;
    }

    public function login()
    {
        $validated = $this->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route("dashboardAdmin");
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout("layouts.auth", ["logo" => $this->logo]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
