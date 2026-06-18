@php
  $user = auth()->user();

  $invoiceAddress = $user->addresses
    ->where('address_type', 'invoice')
    ->first();

  $shippingAddress = $user->addresses
    ->where('address_type', 'shipping')
    ->first();
@endphp
@extends('layout.app')
@section('section')

  @php
    $user = auth()->user();
  @endphp

  <x-page-header title="Your addresses" />
  <x-customer-sidebar />

  <!-- Content -->
  <div class="col-lg-8 col-xl-9 pl-lg-3">
    <form action="{{ route('customerAddresses.store') }}" method="POST">
      @csrf

      <!-- Invoice Address-->
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <div class="block-header mb-5">
        <h5>Invoice address</h5>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label>First Name</label>
          <input type="text" name="first_name" value="{{ old('first_name', $invoiceAddress->first_name ?? '') }}"
            class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label>Last Name</label>
          <input type="text" name="last_name" value="{{ old('last_name', $invoiceAddress->last_name ?? '') }}"
            class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label>Email Address</label>
          <input type="email" name="email" value="{{ old('email', $invoiceAddress->email_address ?? '') }}"
            class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label>Street</label>
          <input type="text" name="street" value="{{ old('street', $invoiceAddress->street ?? '') }}"
            class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label>City</label>
          <input type="text" name="city" value="{{ old('city', $invoiceAddress->city ?? '') }}" class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label>Postal Code</label>
          <input type="text" name="postal_code" value="{{ old('postal_code', $invoiceAddress->postal_code ?? '') }}"
            class="form-control">
        </div>

        <div class="form-group col-md-6">
          <label for="state" class="form-label">State</label>

          @php
            $states = [
              "Andhra Pradesh",
              "Arunachal Pradesh",
              "Assam",
              "Bihar",
              "Chhattisgarh",
              "Goa",
              "Gujarat",
              "Haryana",
              "Himachal Pradesh",
              "Jharkhand",
              "Karnataka",
              "Kerala",
              "Madhya Pradesh",
              "Maharashtra",
              "Manipur",
              "Meghalaya",
              "Mizoram",
              "Nagaland",
              "Odisha",
              "Punjab",
              "Rajasthan",
              "Sikkim",
              "Tamil Nadu",
              "Telangana",
              "Tripura",
              "Uttar Pradesh",
              "Uttarakhand",
              "West Bengal"
            ];
          @endphp

          <select id="state" name="state" class="form-control" style="width: 400px; height: 40px; padding: 10px;">
            <option value="">Select State</option>

            @foreach ($states as $state)
              <option value="{{ $state }}" {{ old('state', $invoiceAddress->state ?? '') == $state ? 'selected' : '' }}>
                {{ $state }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6">
          <label>Phone Number</label>
          <input type="tel" name="phone_number" value="{{ old('phone_number', $invoiceAddress->phone_number ?? '') }}"
            class="form-control">
        </div>

        <div class="form-group col-12 mt-3 ml-3">
          <input id="another-address" type="checkbox" name="different_shipping" value="1" class="checkbox-template" {{ old('different_shipping', $shippingAddress ? 1 : 0) ? 'checked' : '' }}>
          <label for="another-address" data-toggle="collapse" data-target="#shippingAddress"> Use different shipping
            address</label>
        </div>
      </div>

      <!-- Shipping Address -->
      <div id="shippingAddress" class="collapse {{ old('different_shipping', $shippingAddress ? 1 : 0) ? 'show' : '' }}">

        <div class="block-header mb-5 mt-3">
          <h5>Shipping address</h5>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label>First Name</label>
            <input type="text" name="shipping_first_name"
              value="{{ old('shipping_first_name', $shippingAddress->first_name ?? '') }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label>Last Name</label>
            <input type="text" name="shipping_last_name"
              value="{{ old('shipping_last_name', $shippingAddress->last_name ?? '') }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label>Email Address</label>
            <input type="email" name="shipping_email"
              value="{{ old('shipping_email', $shippingAddress->email_address ?? '') }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label>Street</label>
            <input type="text" name="shipping_address"
              value="{{ old('shipping_address', $shippingAddress->street ?? '') }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label>City</label>
            <input type="text" name="shipping_city" value="{{ old('shipping_city', $shippingAddress->city ?? '') }}"
              class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label>Postal Code</label>
            <input type="text" name="shipping_zip" value="{{ old('shipping_zip', $shippingAddress->postal_code ?? '') }}"
              class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label for="shipping_state" class="form-label">State</label>

            <select id="shipping_state" name="shipping_state" class="form-control"
              style="width: 400px; height: 40px; padding: 10px;">
              <option value="">Select State</option>

              @foreach ($states as $state)
                <option value="{{ $state }}" {{ old('shipping_state', $shippingAddress->state ?? '') == $state ? 'selected' : '' }}>
                  {{ $state }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group col-md-6">
            <label>Phone Number</label>
            <input type="tel" name="shipping_phone_number"
              value="{{ old('shipping_phone_number', $shippingAddress->phone_number ?? '') }}" class="form-control">
          </div>
        </div>

      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif
      <!-- Submit -->
      <div class="row">
        <div class="form-group col-12 mt-3">
          <button type="submit" class="btn btn-template wide"> <i class="fa fa-save"></i>Save changes </button>
        </div>
      </div>
    </form>
  </div>
  </div>
  </div>
  </section>

@endsection