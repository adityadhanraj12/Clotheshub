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
          <form method="POST" action="{{ route('cart.add') }}">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <label>Quantity</label>
            <input type="number" name="quantity" value="1" min="1"
              style="width:60px; padding-left:12px; border-radius:15px;">
            <button type="submit" class="btn btn-template wide">
              Add to Cart
            </button>
          </form>
          <br>
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
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