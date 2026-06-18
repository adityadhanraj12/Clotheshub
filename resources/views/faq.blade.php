@extends('layout.app')
@section('section')
  <x-page-header title="Frequently asked questions" />
  <!-- FAQ-->
  <section class="padding-small">
    <div class="container">
      <header>
        <p class="lead text-muted">
          Find answers to the most common questions about orders, shipping, returns, payments, and account management.
          If you need further assistance, our support team is always ready to help.
        </p>
      </header>
      <div class="py-4">
        <h2 class="mb-5 text-secondary">Shopping</h2>
        <div class="row">
          <div class="col-md-6">
            <h5>What payment methods do you accept?</h5>
            <p class="text-muted mb-4">We accept UPI, Credit/Debit Cards, Net Banking, Wallets, and Cash on Delivery (COD)
              for eligible orders.</p>
            <h5>How can I track my order?</h5>
            <p class="text-muted mb-4">Once your order is shipped, you will receive a tracking ID via email and SMS. You
              can also track your order from your account dashboard.</p>
          </div>
          <div class="col-md-6">
            <h5>Do you offer free shipping?</h5>
            <p class="text-muted mb-4">Yes, we provide free shipping on orders above ₹300 across India. Our goal is to
              make online shopping convenient and affordable.
            </p>
            </p>
            <h5>One of my items is missing. What should I do?</h5>
            <p class="text-muted mb-4">If an item is missing from your package, please contact our support team within 48
              hours of delivery for immediate assistance.</p>
          </div>
        </div>
      </div>
      <hr>
      <div class="py-4">
        <h2 class="mb-5 text-secondary">Payment</h2>
        <div class="row">
          <div class="col-md-6">
            <h5>Is Cash on Delivery (COD) available?</h5>
            <p class="text-muted mb-4">Yes, COD is available for selected locations. You can check availability during
              checkout.</p>
            <h5>Is online payment secure?</h5>
            <p class="text-muted mb-4">Absolutely. All payments are processed through secure and encrypted payment
              gateways.</p>
          </div>
          <div class="col-md-6">
            <h5>Can I get an invoice for my order?</h5>
            <p class="text-muted mb-4">Yes, a digital invoice is automatically sent to your registered email address after
              order confirmation.</p>
            <h5>Why was my payment declined?</h5>
            <p class="text-muted mb-4">Payment failures may occur due to insufficient balance, incorrect card details,
              bank restrictions, or network issues. Please try again or use another payment method.</p>
          </div>
        </div>
      </div>
      <hr>
      <div class="py-4">
        <h2 class="mb-5 text-secondary">Returns & Refunds</h2>
        <div class="row">
          <div class="col-md-6">
            <h5>What is your return policy?</h5>
            <p class="text-muted mb-4">Products can be returned within 7 days of delivery if they are unused, unworn, and
              in their original packaging.</p>
            <h5>When will I receive my refund?</h5>
            <p class="text-muted mb-4">Refunds are processed within 5–7 business days after the returned item has been
              inspected and approved.</p>
          </div>
          <div class="col-md-6">
            <h5>What if I receive a damaged product?</h5>
            <p class="text-muted mb-4">Please report damaged or defective products within 48 hours of delivery, and we'll
              arrange a replacement or refund.</p>
          </div>

        </div>
      </div>
    </div>
  </section>

@endsection