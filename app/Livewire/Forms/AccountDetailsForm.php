<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;
use App\Models\User;

class AccountDetailsForm extends Form
{
    public ?User $user;
 
    public $name = '';
    public $email = '';
 
    public function setUser(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user)],
        ];
    }

    public function update()
    {
        $this->validate(); 
        $this->user->update($this->all());
    }
}
