@extends('layout.app')
@section('section')
  <x-page-header title="Checkout" />
  <!-- Checout Forms-->
  <section class="checkout">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route('checkout1') }}" class="nav-link">Address</a></li>
            <li class="nav-item"><a href="{{ route('checkout2') }}" class="nav-link">Delivery Method </a></li>
            <li class="nav-item"><a href="{{ route('checkout3') }}" class="nav-link">Payment Method </a></li>
            <li class="nav-item"><a href="{{ route('checkout4') }}" class="nav-link active">Order Review</a></li>
          </ul>
          <div class="tab-content">
            <div id="order-review" class="tab-block">
              <div class="cart">
                <div class="cart-holder">
                  <div class="basket-header">
                    <div class="row">
                      <div class="col-6">Product</div>
                      <div class="col-2">Price</div>
                      <div class="col-2">Quantity</div>
                      <div class="col-2">Unit Price</div>
                    </div>
                  </div>
                  <div class="basket-body">

                    @forelse($carts as $cart)

                      <div class="item row d-flex align-items-center">

                        <div class="col-6">
                          <div class="d-flex align-items-center">

                            <img src="{{ asset($cart->product->image_url ?? 'img/shirt.png') }}" class="img-fluid"
                              width="80">

                            <div class="title">
                              <a href="{{ route('product.show', $cart->product->id) }}">
                                <h6>{{ $cart->product->name }}</h6>
                                <span class="text-muted">Size: Standard</span>
                              </a>
                            </div>

                          </div>
                        </div>

                        <div class="col-2">
                          <span>₹{{ number_format($cart->product->base_price, 2) }}</span>
                        </div>

                        <div class="col-2">
                          <span>{{ $cart->quantity }}</span>
                        </div>

                        <div class="col-2">
                          <span>
                            ₹{{ number_format($cart->quantity * $cart->product->base_price, 2) }}
                          </span>
                        </div>

                      </div>

                    @empty
                      <p class="text-center">No products in cart.</p>
                    @endforelse

                  </div>
                </div>
                @php
                  $subtotal = $carts->sum(function ($cart) {
                    return $cart->quantity * ($cart->product->base_price ?? 0);
                  });

                  $shipping = 0;
                  $tax = 0;
                  $total = $subtotal + $shipping + $tax;
                @endphp

                <div class="total row">
                  <span class="col-md-10 col-2">Total</span>
                  <span class="col-md-2 col-10 text-primary">
                    ₹{{ number_format($total, 2) }}
                  </span>
                </div>
              </div>
              <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="{{ route('checkout3') }}"
                  class="btn btn-template-outlined wide prev"><i class="fa fa-angle-left"></i>Back to payment method</a>
                <form action="{{ route('checkout.placeOrder') }}" method="POST">
                  @csrf

                  <button type="submit" class="btn btn-template wide next">
                    Place an order
                    <i class="fa fa-angle-right"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <x-order-summary :carts="$carts" />
      </div>
    </div>
  </section>

@endsection