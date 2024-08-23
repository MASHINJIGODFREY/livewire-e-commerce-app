<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\DeleteAccountForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class DeleteAccountComponent extends Component
{
    public DeleteAccountForm $form;

    public function mount()
    {
        $this->form->setUser(Auth::user());
    }
 
    public function deleteUser()
    {
        $this->form->checkPassword();
        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to delete your account ?'); 
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload)
    {
        Auth::logout();
        $this->form->destroy();
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
    
    public function render()
    {
        return view('livewire.delete-account-component');
    }
}
