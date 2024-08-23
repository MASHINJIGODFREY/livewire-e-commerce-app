<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;

class DeleteAccountForm extends Form
{
    public $password = '';
 
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function rules()
    {
        return ['password' => ['required', 'current_password']];
    }

    public function destroy()
    {
        $this->validate();
        Auth::logout();
        $this->user->delete();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
