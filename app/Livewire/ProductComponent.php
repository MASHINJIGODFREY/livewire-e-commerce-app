<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductComponent extends Component
{
    public $id;

    public function AddToCart($id, $name, $price)
    {
        dd($name);
        Cart::add($id, $name, 1, $price)->associate("App\Models\Product");
        // return redirect()->route("cart");
    }

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $product = Product::where('id', $this->id)->first();
        $categories = Category::active()->get();
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        $latest_products = Product::latest()->take(3)->get();
        return view('livewire.product-component', [
            'product' => $product, 
            'categories' => $categories,
            'related' => $related,
            'latest_products' => $latest_products
        ]);
    }
}
