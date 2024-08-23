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
        $this->form->destroy();
        flash()->success('Your account has been successfully deleted!');
        return $this->redirect('/login', navigate: true);
    }
    
    public function render()
    {
        return view('livewire.delete-account-component');
    }
}
