<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class ShopComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::active()->get();
        $products = Product::paginate(20);
        $latest_products = Product::latest()->take(3)->get();
        return view('livewire.shop-component', [
            'categories' => $categories,
            'products' => $products,
            'latest_products' => $latest_products
        ]);
    }
}
