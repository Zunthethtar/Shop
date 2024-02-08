@extends('master')

@section('content')

<style>
    .product {
        text-align: center;
        margin-bottom: 20px;
    }

    .product img {
        max-width: 100%;
        height: auto;
        max-height: 200px; /* Increase the maximum height as per your preference */
        cursor: pointer;
        transition: transform 0.2s;
    }

    .product img:hover {
        transform: scale(1.1);
    }

    .modal-dialog {
        max-width: 80%; /* Adjust the max-width according to your needs */
    }

    /* Custom styles for horizontally centered product listings */
    .product-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .product-wrapper {
        flex: 0 0 calc(33.3333% - 20px); /* Adjust the width of each product item */
        margin: 10px;
    }

</style>
<div class="container-fluid py-2 px-xl-5 mb-3">
    <div class="d-flex align-items-center">
        <h2 class="m-0">Product Listings</h2>
    </div>
</div>

<div class="container mt-5">


    <!-- Product Listing Page -->
    <div class="product-container">
        @foreach($products as $product)
            <div class="product-wrapper">
                <div class="product">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" data-toggle="modal" data-target="#productModal{{$product->id}}">
                    <h4>{{ $product->name }}</h4>
                    <!-- Other minimal details -->
                </div>
            </div>

            <!-- Product Modal -->
            <div class="modal fade" id="productModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{$product->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel{{$product->id}}">{{ $product->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Display all details of the product -->
                            <p>{{ $product->sub_category ? $product->sub_category->name : "null" }}</p>
                            <p>{{ $product->description }}</p>
                            <p>{{ $product->shop ? $product->shop->name : "null" }}</p>

                            <p>Price: ${{ $product->price }}</p>
                            <!-- Add to cart button -->
                            <button class="add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
