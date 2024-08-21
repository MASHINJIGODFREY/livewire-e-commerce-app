<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class SearchComponent extends Component
{
    use WithPagination;

    public $query;
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

    public function mount()
    {
        $queryParams = request()->only('query');
        $this->query = $queryParams["query"];
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
        $query = Product::whereLike('name', '%'.$this->query.'%');
        if($this->orderBy == 'Price: Low to High'){
            $query = $query->orderby('sale_price','asc');
        }else if($this->orderBy == 'Price: High to Low'){
            $query = $query->orderby('sale_price','desc');
        }else{
            $query = $query->orderby('created_at','desc');
        }
        $products = $query->paginate($this->pageSize);
        $latest_products = Product::latest()->take(3)->get();
        return view('livewire.search-component', [
            'categories' => $categories,
            'products' => $products,
            'latest_products' => $latest_products
        ]);
    }
}
