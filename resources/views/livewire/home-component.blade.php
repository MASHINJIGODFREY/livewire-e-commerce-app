<div>
    <section class="home-slider position-relative pt-50" wire:ignore>
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @foreach($sliders as $key => $slider)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">{{ $slider->top_title }}</h4>
                                <h2 class="animated fw-900">{{ $slider->title }}</h2>
                                <h1 class="animated fw-900 text-brand">{{ $slider->sub_title }}</h1>
                                <p class="animated">Save more with coupons & up to {{ $slider->offer }} off</p>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('shop') }}" wire:navigate> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{ asset($slider->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach             
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-1.png') }}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-2.png') }}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-3.png') }}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-4.png') }}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-5.png') }}" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('assets/imgs/theme/icons/feature-6.png') }}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                    </li>
                </ul>
                <a href="{{ route('shop') }}" class="view-more d-none d-md-flex" wire:navigate>
                    View More<i class="fi-rs-angle-double-small-right"></i>
                </a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach($products as $key => $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
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
                    <!--End product-grid-4-->
                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-sm" wire:click="loadMore">
                            <span wire:loading.remove wire:target="loadMore">Load More</span>
                            <span wire:loading wire:target="loadMore">&#8987; Loading...</span>
                        </button>
                    </div>
                </div>
                <!--En tab one (Featured)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{ asset('assets/imgs/banner/banner-4.png') }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="{{ route('shop') }}" wire:navigate class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-categories section-padding mt-15 mb-25" wire:ignore>
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach($popular_categories as $key => $popular_category)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="{{ route('category', ['id' => $popular_category->id]) }}"><img src="{{ asset($popular_category->image) }}" alt=""></a>
                        </figure>
                        <h5><a href="{{ route('category', ['id' => $popular_category->id]) }}" wire:navigate>{{ $popular_category->name }}</a></h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                @foreach($banners as $key => $banner)
                <div class="{{$loop->last ? 'col-lg-4 d-md-none d-lg-flex' : 'col-lg-4 col-md-6'}}">
                    <div class="{{$loop->last ? 'banner-img wow fadeIn animated mb-sm-0' : 'banner-img wow fadeIn animated'}}">
                        <img src="{{ asset($banner->image) }}" alt="">
                        <div class="banner-text">
                            <span>{{ $banner->top_title }}</span>
                            <h4>Save {{ $banner->offer }}% on <br>{{ $banner->title }}</h4>
                            <a href="{{ route('shop') }}" wire:navigate>Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-padding" wire:ignore>
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach($new_products as $key => $new_product)
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('product', ['id' => $new_product->id]) }}" wire:navigate>
                                    <img class="default-img" src="{{ asset($new_product->image) }}" alt="">
                                    <img class="hover-img" src="{{ asset($new_product->image) }}" alt="">
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('product', ['id' => $new_product->id]) }}" wire:navigate>{{ $new_product->name }}</a></h2>
                            <div class="rating-result" title="90%">
                                <span></span>
                            </div>
                            <div class="product-price">
                                <span>${{ $new_product->sale_price }} </span>
                                <span class="old-price">${{ $new_product->regular_price }}</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-padding" wire:ignore>
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach($brands as $key => $brand)
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset($brand->logo) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
