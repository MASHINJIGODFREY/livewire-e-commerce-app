<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DeleteAccountForm extends Form
{
    public ?User $user;

    public $password = '';
 
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function rules()
    {
        return ['password' => ['required', 'current_password']];
    }

    public function checkPassword()
    {
        $this->validate();
    }

    public function destroy()
    {
        $this->user->delete();
    }
}
