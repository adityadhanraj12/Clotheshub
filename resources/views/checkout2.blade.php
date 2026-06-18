@extends('layout.app')
@section('section')
  <x-page-header title="Checkout" />
  <!-- Checkout Forms-->
  <section class="checkout">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route('checkout1') }}" class="nav-link">Address</a></li>
            <li class="nav-item"><a href="{{ route('checkout2') }}" class="nav-link active">Delivery Method </a></li>
            <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
            <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
          </ul>
          <div class="tab-content">
            <div id="delivery-method" class="tab-block">
              <form action="{{ route('checkout2.save') }}" method="POST" class="shipping-form">
                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="radio" name="delivery_method" value="Standard Delivery" id="option1"
                      class="radio-template" checked>
                    <label for="option1"><strong>Standard Delivery</strong><br><span class="label-description">Delivery
                        within 5-7 business days. Free on orders above ₹300.</span></label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="radio" name="delivery_method" value="Express Delivery" id="option2"
                      class="radio-template">
                    <label for="option2"><strong>Express Delivery</strong><br><span class="label-description">Receive your
                        order within 2-3 business days.</span></label>
                  </div>
                </div>
                <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a
                    href="{{ route('checkout1') }}" class="btn btn-template-outlined wide prev"><i
                      class="fa fa-angle-left"></i>Back to Address</a><button type="submit"
                    class="btn btn-template wide next">
                    Choose payment method
                    <i class="fa fa-angle-right"></i>
                  </button></div>
            </div>
            </form>

          </div>
        </div>
        <x-order-summary :carts="$carts" />
      </div>
    </div>
  </section>

@endsection