<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'Default Sorting';

    public function setpagesize($size)
    {
        $this->pageSize = $size;
    }

    public function setSortPattern($pattern)
    {
        $this->orderBy = $pattern;
    }

    public function addToCart($id, $name, $price)
    {
        Cart::instance('cart')->add($id, $name, 1, $price)->associate("App\Models\Product");
        $this->dispatch('refresh-cart-icon-component');
        flash()->success('Item added to cart successfully!');
    }

    public function render()
    {
        $categories = Category::active()->get();
        if($this->orderBy == 'Price: Low to High'){
            $query = Product::orderby('sale_price','asc');
        }else if($this->orderBy == 'Price: High to Low'){
            $query = Product::orderby('sale_price','desc');
        }else{
            $query = Product::orderby('created_at','desc');
        }
        $products = $query->paginate($this->pageSize);
        $latest_products = Product::latest()->take(3)->get();
        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $products,
            'latest_products' => $latest_products
        ]);
    }
}
