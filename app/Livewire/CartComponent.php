<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function incrementqty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function decrementqty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if($product->qty > 1){
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId, $qty);
        }
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
    }

    public function clearCart()
    {
        Cart::instance('cart')->destroy();
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
