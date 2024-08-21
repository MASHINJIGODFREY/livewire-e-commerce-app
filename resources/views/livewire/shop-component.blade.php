<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow" wire:navigate>Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{ $products->count() }}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{ $pageSize }} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a @if($pageSize == 12) class="active" @endif href="#" wire:click.prevent="setpagesize(12)">12</a></li>
                                        <li><a @if($pageSize == 24) class="active" @endif href="#" wire:click.prevent="setpagesize(24)">24</a></li>
                                        <li><a @if($pageSize == 30) class="active" @endif href="#" wire:click.prevent="setpagesize(30)">30</a></li>
                                        <li><a @if($pageSize == 40) class="active" @endif href="#" wire:click.prevent="setpagesize(40)">40</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{ $orderBy }} <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a @if($orderBy == 'Default Sorting') class="active" @endif href="#" wire:click.prevent="setSortPattern('Default Sorting')">Default Sorting</a></li>
                                        <li><a @if($orderBy == 'Price: Low to High') class="active" @endif href="#" wire:click.prevent="setSortPattern('Price: Low to High')">Price: Low to High</a></li>
                                        <li><a @if($orderBy == 'Price: High to Low') class="active" @endif href="#" wire:click.prevent="setSortPattern('Price: High to Low')">Price: High to Low</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @foreach($products as $key => $product)
                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product', ['id' => $product->id]) }}" wire:navigate>
                                            <img class="default-img" src="{{ asset($product->image) }}" alt="">
                                            <img class="hover-img" src="{{ asset($product->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{ route('category', ['id' => $product->category->id]) }}" wire:navigate>{{ $product->category->name }}</a>
                                    </div>
                                    <h2><a href="{{ route('product', ['id' => $product->id]) }}" wire:navigate>{{ $product->name }}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>${{ $product->sale_price }} </span>
                                        <span class="old-price">${{ $product->regular_price }}</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" wire:click.prevent="addToCart('{{$product->id}}', '{{$product->name}}', '{{$product->sale_price}}')">
                                            <i class="fi-rs-shopping-bag-add" wire:loading.remove wire:target="addToCart('{{$product->id}}', '{{$product->name}}', '{{$product->sale_price}}')"></i>
                                            <span wire:loading wire:target="addToCart('{{$product->id}}', '{{$product->name}}', '{{$product->sale_price}}')">&#8987;</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--pagination-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $products->links() }}
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            @foreach($categories as $key => $category)
                            <li><a href="{{ route('category', ['id' => $category->id]) }}" wire:navigate>{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach($latest_products as $key => $latest_product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset($latest_product->image) }}" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('product', ['id' => $latest_product->id]) }}" wire:navigate>{{ $latest_product->name }}</a></h5>
                                <p class="price mb-0 mt-5">${{ $latest_product->sale_price }}</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
