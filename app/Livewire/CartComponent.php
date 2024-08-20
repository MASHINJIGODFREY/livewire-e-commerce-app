<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;

class CartComponent extends Component
{
    #[On('refresh-cart-component')]
    public function refreshComponent()
    {
        return '$refresh';
    }

    public function incrementqty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->dispatch('refresh-cart-icon-component');
    }

    public function decrementqty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if($product->qty > 1){
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId, $qty);
            $this->dispatch('refresh-cart-icon-component');
        }
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->dispatch('refresh-cart-icon-component');
        flash()->success('Item removed from cart!');
    }

    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        $this->dispatch('refresh-cart-icon-component');
        flash()->success('Cart successfully cleared!');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
