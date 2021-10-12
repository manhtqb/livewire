<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function register()
    {
        $data = $this->validate([
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6|max:20|same:passwordConfirmation'
        ]);

        $user = User::create([
           'email' => $data['email'],
           'password' => \Hash::make($data['password']),
        ]);

        auth()->login($user);

        return redirect('/');
    }

    public function updatedEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:users',
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.base');
    }
}
