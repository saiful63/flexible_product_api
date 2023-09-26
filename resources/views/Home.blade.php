@extends('layouts.app')

@section('content')

<div class="container mt-5">
        <div class="card">
            @if(Session::has('msg'))
               <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <div class="card-header">
                <span>Product List</span>
                @if(Auth::user()->role=='admin' || Auth::user()->role=='editor')
                    @else
                        <span class="added_item">
                        <a href="{{ route('viewAddedItem') }}">Added item</a>
                        <span class="added_item_val"></span>
                        </span>
                @endif

                @if(Auth::user()->role=='admin')
                 <span><a href="{{'/add_info'}}" class="btn btn-primary my-4">Add info</a></span>
                @endif
                 <a href="{{ route('logout') }}" class="btn btn-danger my-4">Logout</a>
                  <span class="ml-3 btn btn-success">Logged in user: {{ Auth::user()->name }}</span>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Writer</th>
                            <th>Book price</th>
                            <th>Book Image</th>
                            @if(Auth::user()->role=='admin' || Auth::user()->role=='editor')
                                <th>Action</th>
                                @else
                                <th>Add to cart</th>
                            @endif

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                          @can('view',$product)
                            <tr>
                                <td>{{ $product->book_name }}</td>
                                <td>{{ $product->book_writer }}</td>
                                <td>{{ $product->book_price }}</td>
                                <td>{{ $product->book_image }}</td>
                                @cannot('cartItem',$product)
                                    <td>
                                    <button class="item_id" data-item_id="{{ $product->id }}" name="product_id" type="submit">Add</button>
                                    </td>
                                @endcannot

                                <td>
                                    @can('update',$product)
                                      <a class="btn btn-primary" href="{{url('/edit-data/'.$product->id)}}">Edit</a>
                                    @endcan

                                    @can('delete',$product)
                                      <a class="btn btn-danger" href="{{url('/delete-data/'.$product->id)}}" onclick = "confirm('Are you want to delete..');">Delete</a>
                                    @endcan
                                </td>


                            </tr>
                            @endcan


                        @endforeach

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

