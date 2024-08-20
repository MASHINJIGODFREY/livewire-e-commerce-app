<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow" wire:navigate>Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::instance('cart')->content() as $key => $item)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{ asset($item->model->image) }}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{ route('product', ['id' => $item->model->id]) }}" wire:navigate>{{ $item->name }}</a></h5>
                                        <p class="font-xs">{{ $item->model->short_description }}</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>${{ $item->price }} </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down" wire:click.prevent="decrementqty('{{ $item->rowId }}')"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">{{ $item->qty }}</span>
                                            <a href="#" class="qty-up" wire:click.prevent="incrementqty('{{ $item->rowId }}')"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>${{ $item->subtotal() }} </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevent="destroy('{{ $item->rowId }}')"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted" wire:click.prevent="clearCart()"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                        <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-7 col-md-12"></div>
                        <div class="col-lg-5 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Cart Totals</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{ Cart::instance('cart')->subtotal() }}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{ Cart::instance('cart')->total() }}</span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
