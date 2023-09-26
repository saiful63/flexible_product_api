<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <span>Product List</span>
                <span class="added_item">
                   <a href="{{ route('viewAddedItem') }}">Added item</a>
                   <span class="added_item_val"></span>
                </span>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Writer</th>
                            <th>Book price</th>
                            <th>Book Image</th>
                            <th>Volume</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products_of_cart as $item)
                            <tr>
                                <td>{{ $item->product->book_name }}</td>
                                <td>{{ $item->product->book_writer }}</td>
                                <td>{{ $item->product->book_price }}</td>
                                <td>{{ $item->product->book_image }}</td>
                                <td>{{ $item->product_count}}</td>
                            </tr>

                        @endforeach

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    @include('scripts');
</body>
</html>
