<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartIconComponent extends Component
{
    #[On('refresh-cart-icon-component')]
    public function refreshComponent()
    {
        return '$refresh';
    }

    public function remove($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refresh-cart-component');
        flash()->success('Item removed from cart!');
    }

    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
