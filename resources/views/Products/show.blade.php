@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="">Please call us to place an order at 601-812-8079</h3>
            @foreach($product as $p)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$p->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text">{{$p->description}}</p>
                        <p class="card-text">${{$p->price}}</p>
                        <a href="/add-to-cart/{{$p->id}}" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
