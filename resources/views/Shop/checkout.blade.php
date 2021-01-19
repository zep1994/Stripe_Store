@extends('layouts.app')

@section('content')
    <div class="container col-md-offset-4">
        <div class="row">
            <div class="col-sm-6 col-md-10 col-md-offset-6 col-sm-offset-6">
                <h1>Checkout</h1>
                <h4>Your Total: ${{ $total }}</h4>
                <form action="{{ route('checkout') }}" method="POST" id="checkout-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="card-name">Credit Card Holder Name</label>
                                <input type="text" id="card-name" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="card-number">Credit Card Number</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 mr-5">
                            <div class="form-group">
                                <label for="card-exp-date">Card Expiration Month</label>
                                <input type="text" id="card-exp-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-exp-year">Card Expiration Year</label>
                                <input type="text" id="card-exp-year" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="card-cvc">CVC</label>
                                <input type="text" id="card-cvc" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success"> Buy Now </button>
                </form>
            </div>
        </div>
    </div>

@endsection
