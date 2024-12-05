<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($this->all())) {
            return redirect()->route("dashboardAdmin");
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout("layouts.auth");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
