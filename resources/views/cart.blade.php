@extends('layout.app')
@section('section')
  <x-page-header title="Shopping Cart" />

  <!-- Shopping Cart Section-->
  <section class="shopping-cart">
    <div class="container">
      <div class="basket">
        <div class="basket-holder">
          <div class="basket-header">
            <div class="row">
              <div class="col-5">Product</div>
              <div class="col-2">Price</div>
              <div class="col-2">Quantity</div>
              <div class="col-2">Total</div>
              <div class="col-1 text-center">Remove</div>
            </div>
          </div>
          <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="basket-body">
              @forelse($carts as $cart)
                <div class="item">
                  <div class="row d-flex align-items-center">
                    <div class="col-5">
                      <div class="d-flex align-items-center">
                        <img src="{{ asset($cart->product->image_url ?? 'img/shirt.png') }}" class="img-fluid" width="80">
                        <div class="title">
                          <h5>{{ $cart->product->name }}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-2"> ₹{{ number_format($cart->product->base_price, 2) }} </div>
                    <div class="col-2">
                      <input type="number" name="quantities[{{ $cart->id }}]" value="{{ $cart->quantity }}" min="1"
                        class="form-control" style="width:80px">
                    </div>
                    <div class="col-2"> ₹{{ number_format($cart->quantity * $cart->product->base_price, 2) }} </div>
                    <div class="col-1 text-center">
                      <a href="{{ route('cart.remove', $cart->id) }}"
                        onclick="event.preventDefault(); document.getElementById('delete-cart-{{ $cart->id }}').submit();"
                        class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </div>
              @empty
                <p class="text-center">Your cart is empty.</p>
              @endforelse
            </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="CTAs d-flex align-items-center justify-content-center justify-content-md-end">
        <a href="{{ route('category') }}" class="btn btn-template-outlined wide mr-md-3 mb-2 mb-md-0">
          Continue Shopping
        </a>
        <button type="submit" class="btn btn-template wide">
          Update Cart
        </button>
      </div>
    </div>
    </form>
    @foreach($carts as $cart)
      <form id="delete-cart-{{ $cart->id }}" action="{{ route('cart.remove', $cart->id) }}" method="POST"
        style="display:none;">
        @csrf
        @method('DELETE')
      </form>
    @endforeach
  </section>
  <!-- Order Details Section-->
  <section class="order-details no-padding-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="block">
            <div class="block-header">
              <h6 class="text-uppercase">Order Summary</h6>
            </div>
            <div class="block-body">
              <p>Shipping and additional costs are calculated based on values you have entered.</p>
              <ul class="order-menu list-unstyled">
                <li class="d-flex justify-content-between"><span>Order Subtotal
                  </span><strong>₹{{ number_format($subtotal, 2) }}</strong></li>
                <li class="d-flex justify-content-between"><span>Shipping and handling</span>@php
                  $shipping = 0;
                @endphp
                  <strong>₹{{ number_format($shipping, 2) }}</strong>
                </li>
                <li class="d-flex justify-content-between"><span>Tax</span><strong>₹0.00</strong></li>
                <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">
                    ₹{{ number_format($subtotal + $shipping, 2) }} </strong></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center CTAs"><a href="{{ route('checkout1') }}"
            class="btn btn-template btn-lg wide">Proceed to checkout<i class="fa fa-long-arrow-right"></i></a></div>
      </div>
    </div>
  </section>

@endsection