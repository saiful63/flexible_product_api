@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="added_item">
        <a href="{{ route('viewAddedItem') }}">Added item</a>
        <span class="added_item_val"></span>
        </span>
        <a href="{{ route('logout') }}" class="btn btn-danger my-4">Logout</a>
    </div>
</div>
<div class="product_secion">
        <div class="product_inner">

                
                @foreach ($products as $product)
                <div class="">
                    <div class="product_card">
                        <img src="{{ asset('img/'.$product->book_image) }}" alt="">

                        <h6>

                                Name: {{ $product->book_name }}

                        </h6>
                        <h6>Price: {{ $product->book_price }}</h6>
                        <h6>Writer: {{ $product->book_writer }}</h6>
                        <button class="btn btn-primary item_id" data-item_id="{{ $product->id }}" name="product_id" type="submit">Add to cart</button>
                    </div>
                </div>
                @endforeach


        </div>

</div>
@endsection
