<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductComponent extends Component
{
    public $id;
    public $name;
    public $qty = 1;
    public $price;

    public function incrementqty()
    {
        $this->qty++;
    }

    public function decrementqty()
    {
        if($this->qty > 1) $this->qty--;
    }

    public function addToCart()
    {
        Cart::instance('cart')->add($this->id, $this->name, $this->qty, $this->price)->associate("App\Models\Product");
        flash()->success('Item added to cart successfully!');
        return $this->redirect('/cart', navigate: true);
    }

    function getItemById($array, $id) {
        foreach ($array as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null; // Return null if no item found
    }

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $product = Product::where('id', $this->id)->first();
        $this->name = $product->name;
        $this->price = $product->sale_price;
        $colors = json_decode($product->color);
        $sizes = json_decode($product->size);
        $images = json_decode($product->images);
        array_splice($images, 0, 0, $product->image);
        $categories = Category::active()->get();
        $product_category = $this->getItemById($categories, $product->category_id);
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        $latest_products = Product::latest()->take(3)->get();
        return view('livewire.product-component', [
            'product' => $product, 
            'images' => $images,
            'colors' => $colors,
            'sizes' => $sizes,
            'product_category' => $product_category,
            'categories' => $categories,
            'related' => $related,
            'latest_products' => $latest_products
        ]);
    }
}
