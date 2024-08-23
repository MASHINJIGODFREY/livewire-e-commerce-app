<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\AccountDetailsForm;
use Illuminate\Support\Facades\Auth;

class AccountDetailsComponent extends Component
{
    public AccountDetailsForm $form;

    public function mount()
    {
        $this->form->setUser(Auth::user());
    }
 
    public function save()
    {
        $this->form->update();
        flash()->success('Your account details have been updated!');
    }

    public function render()
    {
        return view('livewire.account-details-component');
    }
}
