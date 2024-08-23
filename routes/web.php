<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/about', App\Livewire\AboutComponent::class)->name('about');

Route::get('/cart', App\Livewire\CartComponent::class)->name('cart');

Route::get('/category/{id}', App\Livewire\CategoryComponent::class)->name('category');

Route::get('/checkout', App\Livewire\CheckoutComponent::class)->name('checkout');

Route::get('/contact', App\Livewire\ContactComponent::class)->name('contact');

Route::get('/product/{id}', App\Livewire\ProductComponent::class)->name('product');

Route::get('/search-product', App\Livewire\SearchComponent::class)->name('search');

Route::get('/shop', App\Livewire\ShopComponent::class)->name('shop');

Route::get('/', App\Livewire\HomeComponent::class)->name('home');

Route::middleware('auth')->prefix('account')->group(function () {

    Route::get('/account-details', App\Livewire\AccountDetailsComponent::class)->name('account_details');

    Route::get('/change-password', App\Livewire\ChangePasswordComponent::class)->name('change_password');

    Route::get('/', App\Livewire\DashboardComponent::class)->name('dashboard');
});

require __DIR__.'/auth.php';
