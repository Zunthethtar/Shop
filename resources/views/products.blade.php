
@extends('master')

@section('content')

<div class="row">

    @foreach($products as $product)

        <div class="col-xs-18 col-sm-6 col-md-3">

            <div class="thumbnail">

                <!-- Set a fixed width and height for the image -->

                <div class="caption">
                    @if ($product->image)
                    <img src="{{  asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="200" height="200">
                    @else
                        No Image
                    @endif
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>

                    <p>{{ $product->category ? $product->category->name : "null" }}</p>

                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a></p>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection
