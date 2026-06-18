<div class="col-lg-4">
    <div class="block-body order-summary">
        <h6 class="text-uppercase">Order Summary</h6>
        <p>Shipping and additional costs are calculated based on values you have entered</p>
        @php
            $subtotal = 0;
            if (isset($carts)) {
                $subtotal = $carts->sum(function ($cart) {
                    return $cart->quantity * ($cart->product->base_price ?? 0);
                });
            }
            $shipping = $subtotal * 0.02;
            $tax = $subtotal * 0.10;
            $total = $subtotal + $shipping + $tax;
        @endphp
        <ul class="order-menu list-unstyled">
            <li class="d-flex justify-content-between">
                <span>Order Subtotal</span>
                <strong>₹{{ number_format($subtotal, 2) }}</strong>
            </li>

            <li class="d-flex justify-content-between">
                <span>Shipping and handling</span>
                <strong>₹{{ number_format($shipping, 2) }}</strong>
            </li>

            <li class="d-flex justify-content-between">
                <span>Tax</span>
                <strong>₹{{ number_format($tax, 2) }}</strong>
            </li>

            <li class="d-flex justify-content-between">
                <span>Total</span>
                <strong class="text-primary price-total">
                    ₹{{ number_format($total, 2) }}
                </strong>
            </li>
        </ul>
    </div>
</div>