<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function incrementqty($rowId, $qty)
    {
        $qty = $qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decrementqty($rowId, $qty)
    {
        if($qty > 1){
            $qty = $qty - 1;
            Cart::update($rowId, $qty);
        }
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
