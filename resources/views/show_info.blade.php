{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>


<div class="container">
         <a href="{{'/add_info'}}" class="btn btn-primary my-4">Add info</a>
          @if(Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
          @endif
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox" name="chkall"></th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($showData as $key => $value)
    <tr>

      <td><input type="checkbox" name="chk" value="{{$value->id}}"></td>
      <td> {{$value->name}} </td>
      <td> {{$value->email}} </td>
      <td>
        <a class="btn btn-primary" href="{{url('/edit-data/'.$value->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{url('/delete-data/'.$value->id)}}" onclick = "confirm('Are you want to delete..');">Delete</a>
      </td>
    </tr>
   @endforeach

  </tbody>
</table>
  {{ $showData->links() }}
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html> --}}










@extends('layouts.app')

@section('content')

<div class="container">
         <a href="{{'/add_info'}}" class="btn btn-primary my-4">Add info</a>
          @if(Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
          @endif
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox" name="chkall"></th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($showData as $key => $value)
    <tr>

      <td><input type="checkbox" name="chk" value="{{$value->id}}"></td>
      <td> {{$value->name}} </td>
      <td> {{$value->email}} </td>
      <td>
        <a class="btn btn-primary" href="{{url('/edit-data/'.$value->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{url('/delete-data/'.$value->id)}}" onclick = "confirm('Are you want to delete..');">Delete</a>
      </td>
    </tr>
   @endforeach

  </tbody>
</table>
  {{ $showData->links() }}
   </div>

@endsection


