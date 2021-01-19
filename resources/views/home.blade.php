@extends('layouts.splash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="">Please call us to place an order at 601-812-8079</h3>
            @foreach($products as $product)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">${{$product->price}}</p>
                        <a href="/products/{{$product->id}}" class="btn btn-primary">Show More</a>
                        <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-primary">Add To Cart</a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
