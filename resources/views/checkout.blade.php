@extends('Layouts.mainLayout')
@section('title', 'Checkout')
@section('css')
    href={{ URL::asset('css/checkout.css')}}
@endsection

@section('maincontent')
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h1>Checkout</h1>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill" id="count"></span>
          </h4>
          <ul class="list-group mb-3" id="list"></ul>
        </div>

        
          <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form  action="checkout" method="post" onsubmit="checkout()" enctype="multipart/form-data">
          <input type="hidden" id="cart-data" name="cart_data" value="">
            @csrf
          @if(isset($customer))
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="firstName" data-id="{{$customer->id}}" value="{{$customer->Name}}" />
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" value="{{$customer->Email}}">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="baddress" placeholder="1234 Main St" value="{{$customer->Address}}">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Shipping Address</label>
                <input type="text" class="form-control" id="ship-address" name="saddress" placeholder="1234 Main St" value="{{$customer->Address}}">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

        @else
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="firstName" data-id="0" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Shipping Address</label>
                <input type="text" class="form-control" id="ship-address" placeholder="1234 Main St" disabled>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>
            @endif

            <hr class="my-4">

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="same-address" name="same_address">
              <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="save-info">
              <label class="form-check-label" for="save-info">Save this information for next time</label>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
              <div class="form-check">
                <input id="cod" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="paypal">Cash on delivery</label>
              </div>
            </div>

            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" name="cc_name" required>
                <small class="text-body-secondary">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>

              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cc_number"required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>

              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" name="cc_expiration" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-success btn-lg" type="submit">Confirm payment</button>
          </form>
        </div>
      </div>
    </main>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ URL::asset('scripts/checkout.js') }}"></script>
@endsection