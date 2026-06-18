@extends('layout.app')

@section('section')
  <x-page-header title="Checkout" />

  <section class="checkout">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <ul class="nav nav-pills">
            <li class="nav-item">
              <a href="{{ route('checkout1') }}" class="nav-link">Address</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('checkout2') }}" class="nav-link">Delivery Method</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('checkout3') }}" class="nav-link active">Payment Method</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link disabled">Order Review</a>
            </li>
          </ul>

          <form action="{{ route('checkout3.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="payment_method" id="payment_method" value="{{ old('payment_method', 'card') }}">

            <div class="tab-content">
              <div id="payment-method" class="tab-block">
                <div id="accordion" role="tablist">
                  {{-- Credit Card --}}
                  <div class="card" id="card-payment">
                    <div class="card-header">
                      <h6>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                          onclick="setPaymentMethod('card')">
                          Credit Card
                        </a>
                      </h6>
                    </div>
                    <div id="collapseOne" class="collapse {{ old('payment_method', 'card') == 'card' ? 'show' : '' }}">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Name on Card</label>
                            <input type="text" name="card_name" class="form-control" value="{{ old('card_name') }}">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Card Number</label>
                            <input type="text" name="card_number" maxlength="16" class="form-control"
                              value="{{ old('card_number') }}">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Expiry Date</label>
                            <input type="text" name="expiry_date" placeholder="MM/YY" maxlength="5" class="form-control"
                              value="{{ old('expiry_date') }}">
                          </div>
                          <div class="form-group col-md-4">
                            <label>CVV</label>
                            <input type="text" name="cvv" class="form-control" maxlength="4" value="{{ old('cvv') }}">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Postal Code</label>
                            <input type="text" name="zip" class="form-control" maxlength="6" value="{{ old('zip') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- UPI --}}
                  <div class="card" id="upi-payment">
                    <div class="card-header">
                      <h6>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                          onclick="setPaymentMethod('upi')">
                          UPI
                        </a>
                      </h6>
                    </div>
                    <div id="collapseTwo" class="collapse {{ old('payment_method') == 'upi' ? 'show' : '' }}">
                      <div class="card-body">
                        <label>UPI ID</label>
                        <input type="text" name="upi_id" class="form-control" placeholder="name@upi"
                          value="{{ old('upi_id') }}">
                      </div>
                    </div>
                  </div>
                  {{-- COD --}}
                  <div class="card" id="cod-payment">
                    <div class="card-header">
                      <h6>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                          onclick="setPaymentMethod('cod')">
                          Cash on delivery
                        </a>
                      </h6>
                    </div>
                  </div>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger mb-3">
                    {{ $errors->first() }}
                  </div>
                @endif
                <div class="CTAs d-flex justify-content-between flex-column flex-lg-row mt-4">
                  <a href="{{ route('checkout2') }}" class="btn btn-template-outlined wide prev">
                    <i class="fa fa-angle-left"></i>
                    Back to delivery method
                  </a>
                  <button type="submit" class="btn btn-template wide next">
                    Continue to order review
                    <i class="fa fa-angle-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <x-order-summary :carts="$carts" />
      </div>
    </div>
  </section>
  <script>
    function setPaymentMethod(method) {
      document.getElementById('payment_method').value = method;

      document.querySelectorAll('.card').forEach(card => {
        card.classList.remove('payment-selected');
      });

      if (method === 'card') {
        document.getElementById('card-payment').classList.add('payment-selected');
      }

      if (method === 'upi') {
        document.getElementById('upi-payment').classList.add('payment-selected');
      }

      if (method === 'cod') {
        document.getElementById('cod-payment').classList.add('payment-selected');
      }
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {

      let selectedMethod = "{{ old('payment_method', 'card') }}";

      setPaymentMethod(selectedMethod);

    });
  </script>
  <style>
    .payment-selected .card-header {
      background-color: #d4edda !important;
    }

    .payment-selected .card-header a {
      color: #155724 !important;
      font-weight: 600;
    }
  </style>
@endsection