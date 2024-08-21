<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', App\Livewire\AboutComponent::class)->name('about');

Route::get('/cart', App\Livewire\CartComponent::class)->name('cart');

Route::get('/category/{id}', App\Livewire\CategoryComponent::class)->name('category');

Route::get('/checkout', App\Livewire\CheckoutComponent::class)->name('checkout');

Route::get('/contact', App\Livewire\ContactComponent::class)->name('contact');

Route::get('/product/{id}', App\Livewire\ProductComponent::class)->name('product');

Route::get('/search-product', App\Livewire\SearchComponent::class)->name('search');

Route::get('/shop', App\Livewire\ShopComponent::class)->name('shop');

Route::get('/', App\Livewire\HomeComponent::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
