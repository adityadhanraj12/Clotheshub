@extends('layout.app')
@section('section')

  <section class="hero hero-home no-padding">
    <!-- Hero Slider-->
    <div class="owl-carousel owl-theme hero-slider">
      <div style="background: url(img/hero-bg.jpg);" class="item d-flex align-items-center has-pattern">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h1>Latest Fashion Collection</h1>
              <ul class="lead">
                <li><strong>Premium Quality</strong> clothing for Men & Women</li>
                <li><strong>New Arrivals</strong> added every week</li>
                <li><strong>Affordable Prices</strong> with exciting discounts</li>
                <li>Fast Delivery & <strong>Easy Returns</strong></li>
              </ul>
              <a href="{{ route('category') }}" class="btn btn-template wide shop-now">Shop Now <i
                  class="icon-bag"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div style="background: url(img/hero-bg-2.jpg);" class="item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-white">
              <h1>Exclusive Men's Collection</h1>
              <p class="lead"> Upgrade your wardrobe with premium shirts, t-shirts, jeans, and accessories. Discover the
                latest trends designed for comfort and style.</p>
              <a href="{{ route('category') }}" class="btn btn-template wide shop-now">Shop Now <i
                  class="icon-bag"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div style="background: url(img/hero-bg-3.jpg);" class="item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-white">
              <h1>New Arrivals Are Here</h1>
              <p class="lead"> Discover the latest fashion trends with our newly launched collection. Shop stylish
                outfits, premium fabrics, and exclusive designs at great prices. </p>
              <a href="{{ route('category') }}" class="btn btn-template wide shop-now"> Shop Now <i
                  class="icon-bag"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section-->
  <section class="categories">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase"><small>Top for this month</small>Our Featured Picks</h2>
      </header>
      <div class="row text-left">
        <div class="col-lg-4"><a href="{{ route('category', ['category' => 1]) }}">
            <div style="background-image: url(img/banner-1.jpg);" class="item d-flex align-items-end">
              <div class="content">
                <h3 class="h5">Men's</h3><span>New Collection</span>
              </div>
            </div>
          </a></div>
        <div class="col-lg-4"><a href="{{ route('category', ['category' => 2]) }}">
            <div style="background-image: url(img/banner-2.jpg);" class="item d-flex align-items-end">
              <div class="content">
                <h3 class="h5">Women's</h3><span>New Collection</span>
              </div>
            </div>
          </a></div>
        <div class="col-lg-4"><a href="{{ route('category', ['category' => 3]) }}">
            <div style="background-image: url(img/banner-3.jpg);" class="item d-flex align-items-end">
              <div class="content">
                <h3 class="h5">Accessories</h3><span>Sale of 20%</span>
              </div>
            </div>
          </a></div>
      </div>
    </div>
  </section>
  <!-- Men's Collection -->
  <section class="men-collection gray-bg">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase"><small>Autumn Choice</small>Men Collection</h2>
      </header>
      <!-- Products Slider-->
      <div class="owl-carousel owl-theme products-slider">
        <!-- item-->
        @foreach($menProducts as $product)
          <div class="item">
            <div class="product is-gray">
              <div class="image d-flex align-items-center justify-content-center">
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="img-fluid">
                <div class="hover-overlay d-flex align-items-center justify-content-center">
                  <div class="CTA d-flex align-items-center justify-content-center">
                    <form action="{{ route('cart.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <input type="hidden" name="quantity" value="1">
                      <button type="submit" class="add-to-cart border-0 bg-transparent"> <i class=""></i>
                      </button>
                    </form>
                    <a href="{{ route('product.show', $product->id) }}" class="visit-product active"> <i
                        class="icon-search"></i> View </a>
                  </div>
                </div>
              </div>
              <div class="title">
                <a href="{{ route('product.show', $product->id) }}">
                  <h3 class="h6 text-uppercase no-margin-bottom"> {{ $product->name }} </h3>
                </a>
                <span class="price text-muted"> ₹{{ number_format($product->base_price, 2) }} </span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Divider Section-->
  <section style="background: url(img/divider-bg.jpg);" class="divider">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <p>Old Collection</p>
          <h2 class="h1 text-uppercase no-margin">Huge Sales</h2>
          <p>At our outlet stores</p><a href="{{ route('category') }}" class="btn btn-template wide shop-now">Shop Now<i
              class="icon-bag"></i></a>
        </div>
      </div>
    </div>
  </section>
  <!-- Women's Collection -->
  <section class="women-collection">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase"><small>Ladies' Time</small>Women Collection</h2>
      </header>
      <!-- Products Slider-->
      <div class="owl-carousel owl-theme products-slider">
        @foreach($womenProducts as $product)
          <div class="item">
            <div class="product is-gray">
              <div class="image d-flex align-items-center justify-content-center">
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="img-fluid">
                <div class="hover-overlay d-flex align-items-center justify-content-center">
                  <div class="CTA d-flex align-items-center justify-content-center">
                    <form action="{{ route('cart.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <input type="hidden" name="quantity" value="1">
                      <button type="submit" class="add-to-cart border-0 bg-transparent"> <i class=""></i>
                      </button>
                    </form>
                    <a href="{{ route('product.show', $product->id) }}" class="visit-product active"> <i
                        class="icon-search"></i>View</a>
                  </div>
                </div>
              </div>
              <div class="title">
                <a href="{{ route('product.show', $product->id) }}">
                  <h3 class="h6 text-uppercase no-margin-bottom">{{ $product->name }}</h3>
                </a>
                <span class="price text-muted">₹{{ number_format($product->base_price, 2) }}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <div id="scrollTop"><i class="fa fa-long-arrow-up"></i></div>
@endsection