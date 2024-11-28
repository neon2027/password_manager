<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        try {
            $credentials = $this->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(auth()->attempt($credentials)) {
                return redirect()->intended('/');
            }

            session()->flash('error::login', 'Invalid credentials. Please try again.');
        } catch(\Exception $e) {
            session()->flash('error::login', 'There was an error logging in. Please try again. **If the problem persists, please contact support.**');
        }
    }
}
