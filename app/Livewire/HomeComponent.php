<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;

class HomeComponent extends Component
{
    public $count = 16;

    public function addToCart($id, $name, $price)
    {
        Cart::instance('cart')->add($id, $name, 1, $price)->associate("App\Models\Product");
        $this->dispatch('refresh-cart-icon-component');
        flash()->success('Item added to cart successfully!');
    }

    public function loadMore()
    {
        $this->count += 4;
    }

    public function render()
    {
        $sliders = Slider::whereDate('start_date','<=',Carbon::today())->whereDate('end_date','>=',Carbon::today())->where('status', 1)->where('type', "slider")->get();
        $categories = Category::active()->get();
        $popular_categories = Category::latest()->limit(7)->get();
        $products = Product::limit($this->count)->get();
        $new_products = Product::latest()->limit(7)->get();
        $brands = Brand::where('status', 1)->get();
        $banners = Slider::limit(3)->get();
        return view('livewire.home-component', [
            'sliders' => $sliders,
            'categories' => $categories,
            'popular_categories' => $popular_categories,
            'products' => $products,
            'banners' => $banners,
            'new_products' => $new_products,
            'brands' => $brands,
        ]);
    }
}
