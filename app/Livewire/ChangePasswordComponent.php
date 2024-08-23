<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\ChangePasswordForm;
use Illuminate\Support\Facades\Auth;

class ChangePasswordComponent extends Component
{
    public ChangePasswordForm $form;

    public function mount()
    {
        $this->form->setUser(Auth::user());
    }
 
    public function save()
    {
        $this->form->update();
        flash()->success("You've successfully changed your password!");
    }

    public function render()
    {
        return view('livewire.change-password-component');
    }
}
