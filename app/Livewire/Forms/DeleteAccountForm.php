<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

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

    public function destroy()
    {
        $this->validate();
        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to delete your account ?'); 
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload)
    {
        Auth::logout();
        $this->user->delete();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        flash()->success('Your account has been successfully deleted!');
        return $this->redirect('/login', navigate: true);
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }
}
