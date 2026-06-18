@extends('layout.app')
@section('section')
  <x-page-header title="About us" />
  <!-- about us-->
  <section class="padding-small">
    <div class="container">
      <div class="row about-item">
        <div class="col-lg-8 col-sm-9">
          <h2>How it all began</h2>
          <p class="text-muted">ClothesHub was founded with a simple vision: to make trendy, high-quality fashion
            accessible to everyone.
            What started as a small online store has grown into a trusted destination for stylish clothing, footwear, and
            accessories for men and women.</p>
        </div>
        <div class="col-lg-4 col-sm-3 d-none d-sm-flex align-items-center">
          <div class="about-icon ml-lg-0"><i class="fa fa-line-chart"></i></div>
        </div>
      </div>
      <div class="row about-item">
        <div class="col-lg-4 col-sm-3 d-none d-sm-flex align-items-center">
          <div class="about-icon mr-lg-0"><i class="fa fa-user-o"> </i></div>
        </div>
        <div class="col-lg-8 col-sm-9">
          <h2>Who we are</h2>
          <p class="text-muted">We are a passionate team of fashion enthusiasts dedicated to bringing the latest styles
            and best shopping experience to our customers.
            Our mission is to combine quality, affordability, and convenience in one place.</p>
        </div>
      </div>
      <div class="row about-item">
        <div class="col-lg-8 col-sm-9">
          <h2>We care</h2>
          <p class="text-muted">Customer satisfaction is at the heart of everything we do. From carefully selected
            products to responsive customer support,
            we strive to ensure every shopping experience is smooth, enjoyable, and reliable.</p>
        </div>
        <div class="col-lg-4 col-sm-3 d-none d-sm-flex align-items-center">
          <div class="about-icon ml-lg-0"><i class="icon icon-heart"></i></div>
        </div>
      </div>
      <div class="row about-item">
        <div class="col-lg-4 col-sm-3 d-none d-sm-flex align-items-center">
          <div class="about-icon mr-lg-0"><i class="icon icon-truck"> </i></div>
        </div>
        <div class="col-lg-8 col-sm-9">
          <h2>Fast delivery</h2>
          <p class="text-muted">We understand that waiting for your order can be exciting. That's why we partner with
            trusted delivery services
            to ensure your products reach you quickly and safely across India.</p>
        </div>
      </div>
      <div class="row about-item">
        <div class="col-lg-8 col-sm-9">
          <h2>Your security and privacy matters</h2>
          <p class="text-muted">Your personal information is protected with secure payment gateways and industry-standard
            security measures.
            We value your privacy and are committed to keeping your data safe and confidential.</p>
        </div>
        <div class="col-lg-4 col-sm-3 d-none d-sm-flex align-items-center">
          <div class="about-icon ml-lg-0"><i class="icon icon-secure-shield"></i></div>
        </div>
      </div>
    </div>
  </section>
@endsection