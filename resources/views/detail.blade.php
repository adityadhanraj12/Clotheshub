@extends('layout.app')

@section('section')

  <x-page-header :title="$product->name" />

  <section class="product-details">
    <div class="container">
      <div class="row">
        <div class="product-images col-lg-6">
          <img src="{{ asset($product->image_url ?? 'img/shirt.png') }}" class="img-fluid" alt="{{ $product->name }}">
        </div>

        <div class="details col-lg-6">
          <div class="d-flex justify-content-between flex-column flex-sm-row">
            <ul class="price list-inline no-margin">
              <li class="list-inline-item current"> $<span id="productPrice">{{ $product->base_price}}</span> </li>
            </ul>
          </div>
          <p>{{ $product->description }}</p>
          <form method="POST" action="{{ route('cart.add') }}" class="d-flex align-items-center flex-wrap">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="d-inline-flex align-items-center mr-3 mb-2">
              <span class="mr-3" style="font-weight: 600; color: #555;">Quantity</span>
              <div class="quantity-selector d-inline-flex align-items-center" style="border: 1.5px solid #E0E0E0; border-radius: 25px; padding: 2px 6px; background: #fff; transition: border-color 0.2s; height: 38px; box-sizing: border-box;" onmouseover="this.style.borderColor='#9055A2'" onmouseout="this.style.borderColor='#E0E0E0'">
                <button type="button" class="border-0 bg-transparent" style="cursor: pointer; padding: 0 10px; font-weight: bold; color: #666; font-size: 1.2em; outline: none; line-height: 1;" onmouseover="this.style.color='#9055A2'" onmouseout="this.style.color='#666'" onclick="let input = this.parentNode.querySelector('input[type=number]'); if (input.value > 1) { input.value = parseInt(input.value) - 1; }">-</button>
                <input type="number" name="quantity" value="1" min="1" max="100" readonly style="width: 35px; border: 0; text-align: center; font-weight: 700; color: #333; font-size: 1.05em; outline: none; background: transparent; -moz-appearance: textfield; pointer-events: none;">
                <style>
                  input[type=number]::-webkit-inner-spin-button, 
                  input[type=number]::-webkit-outer-spin-button { 
                    -webkit-appearance: none; 
                    margin: 0; 
                  }
                </style>
                <button type="button" class="border-0 bg-transparent" style="cursor: pointer; padding: 0 10px; font-weight: bold; color: #666; font-size: 1.2em; outline: none; line-height: 1;" onmouseover="this.style.color='#9055A2'" onmouseout="this.style.color='#666'" onclick="let input = this.parentNode.querySelector('input[type=number]'); if (input.value < 100) { input.value = parseInt(input.value) + 1; }">+</button>
              </div>
            </div>
            <button type="submit" class="btn btn-template mb-2" style="border-radius: 25px; padding: 6px 25px; height: 38px; line-height: 1; display: inline-flex; align-items: center; justify-content: center; font-weight: 600;">Add to Cart</button>
          </form>
          <br>
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
          @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>

  <section class="product-description no-padding">
    <div class="container">
      <ul role="tablist" class="nav nav-tabs flex-column flex-sm-row">
        <li class="nav-item"><a data-toggle="tab" href="#description" role="tab" class="nav-link active">Description</a>
        </li>
        <li class="nav-item"><a data-toggle="tab" href="#additional-information" role="tab" class="nav-link">Additional
            Information</a></li>
      </ul>
      <div class="tab-content">
        <div id="description" role="tabpanel" class="tab-pane active">
          <p> {{ $product->description ?? 'No description available.' }} </p>
        </div>
        <div id="additional-information" role="tabpanel" class="tab-pane">
          @php
            $info = $product->additionalInformation;
          @endphp
          <table class="table">
            <tbody>
              <tr>
                <th class="border-0">Material:</th>
                <td class="border-0">{{ $info->material ?? '-' }}</td>
              </tr>
              <tr>
                <th>Style:</th>
                <td>{{ $info->style ?? '-' }}</td>
              </tr>
              <tr>
                <th>Properties:</th>
                <td>{{ $info->properties ?? '-' }}</td>
              </tr>
              <tr>
                <th>Brand:</th>
                <td>{{ $info->brand->brand ?? '-' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection