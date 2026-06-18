@extends('layout.app')
@section('section')

  @php
    $user = auth()->user();
    $order = $order ?? null;
  @endphp

  <section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
          <h1>Order confirmed</h1>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
            <li class="breadcrumb-item active">Order confirmed</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="checkout">
    <div class="container">
      <div class="confirmation-icon"><i class="fa fa-check"></i></div>
      <h2> Thank you, {{ $user->first_name ?? 'Customer' }}. Your order is confirmed. </h2>
      <p class="mb-3"> Your order has been placed successfully. </p>
      <p class="mb-4">We will send you an email at <strong>{{ $user->email ?? '' }}</strong> when it ships.</p>
      <p><a href="{{ route('customerOrders') }}" class="btn btn-template wide">View or manage your order</a></p>
    </div>
  </section>

@endsection