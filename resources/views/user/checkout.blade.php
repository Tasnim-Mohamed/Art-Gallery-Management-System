<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/checkoutStyle.css') }}">
</head>

<body>
    <form id="checkout-form" method="POST" action="{{ route('user.storeOrder') }}">
        @csrf
        <div class="checkout-container">
            <!-- Billing Details -->
            <div class="checkout-section">
                <h1>Checkout</h1>
                <h2>Billing Details</h2>

                <div class="row">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first_name" id="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="last_name" id="last-name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="company">Company Name (Optional)</label>
                    <input type="text" name="company" id="company">
                </div>

                <div class="form-group">
                    <label for="country">Country / Region</label>
                    <select name="country" id="country" required>
                        <option value="">Select a country</option>
                        <option value="Palestine">Palestine</option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                        <option value="Egypt">Egypt</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="street">Street Address</label>
                    <input type="text" name="street" id="street" placeholder="House number and street name" required>
                </div>

                <div class="form-group">
                    <input type="text" name="apartment" id="apartment"
                        placeholder="Apartment, suite, unit, etc. (optional)">
                </div>

                <div class="form-group">
                    <label for="city">Town / City</label>
                    <input type="text" name="city" id="city" required>
                </div>

                <div class="form-group">
                    <label for="state">State / County</label>
                    <input type="text" name="state" id="state" required>
                </div>

                <div class="form-group">
                    <label for="postcode">Postcode / ZIP</label>
                    <input type="text" name="postcode" id="postcode" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" id="email" required>
                </div>

                <div class="form-group">
                    <label for="notes">Order Notes (Optional)</label>
                    <textarea name="notes" id="notes" rows="4"
                        placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="checkout-section">
                <h2>Your Order</h2>

                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="order-summary">
                        @php $grandTotal = 0; @endphp
                        @foreach ($purchases as $purchase)
                            @php $lineTotal = $purchase->quantity * $purchase->total_price; @endphp
                            <tr>
                                <td>{{ $purchase->artwork->title }} × {{ $purchase->quantity }}</td>
                                <td>${{ number_format($lineTotal, 2) }}</td>
                            </tr>
                            @php $grandTotal += $lineTotal; @endphp
                        @endforeach
                    </tbody>
                </table>

                <div class="totals">
                    <div class="totals-row">
                        <span>Subtotal</span>
                        <span>$<span id="order-subtotal">{{ number_format($grandTotal, 2) }}</span></span>
                    </div>
                    <div class="totals-row">
                        <span>Shipping</span>
                        <span>Free Shipping</span>
                    </div>
                    <div class="totals-row total">
                        <span>Total</span>
                        <span>$<span>{{ number_format($grandTotal, 2) }}</span></span>
                    </div>

                    <input type="hidden" name="order_total" value="{{ $grandTotal }}">
                </div>

                <!-- Payment Method -->
                <div class="payment-method">
                    <h2>Payment Method</h2>
                    <div class="payment-option">
                        <input type="radio" id="cash-on-delivery" name="payment" value="cash" checked>
                        <label for="cash-on-delivery">Cash on Delivery</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="credit-card" name="payment" value="credit-card">
                        <label for="credit-card">Credit Card</label>
                    </div>

                    <div class="payment-option">
                        <input type="radio" id="paypal" name="payment" value="PayPal">
                        <label for="paypal">PayPal</label>
                    </div>

                </div>

                <button type="submit" class="checkout-btn">Place Order</button>
                
            </div>
        </div>

    </form>
</body>

</html>