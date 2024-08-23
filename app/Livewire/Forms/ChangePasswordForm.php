<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ChangePasswordForm extends Form
{
    public ?User $user;

    public $current_password = '';
    public $password = '';
    public $password_confirmation = '';
 
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::min(8)->letters()->numbers(), 'confirmed']
        ];
    }

    public function update()
    {
        $this->validate(); 
        $this->user->update(['password' => Hash::make($this->password)]);
        $this->reset();
    }
}
