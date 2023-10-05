@extends('layouts.app')

@section('content')

<div class="container mt-5">
        <div class="card">
            @if(Session::has('msg'))
               <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <div class="card-header">
                <span>Product List</span>
                @if(Auth::user()->role === \App\Models\User::ADMIN)
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
                            @if(Auth::user()->role === \App\Models\User::ADMIN || Auth::user()->role ===\App\Models\User::EDITOR)
                                <th>Action</th>
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
                                <td><img src="{{ asset('img/'.$product->book_image) }}" width="10%" alt=""></td>

                                <td>
                                    <div class="d-flex">
                                        @can('update',$product)
                                           <a class="btn btn-primary m-2" href="{{url('/edit-data/'.$product->id)}}">Edit</a>
                                        @endcan

                                        @can('delete',$product)
                                           <a class="btn btn-danger m-2" href="{{url('/delete-data/'.$product->id)}}" onclick = "confirm('Are you want to delete..');">Delete</a>
                                        @endcan
                                    </div>

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

