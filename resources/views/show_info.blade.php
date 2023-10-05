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


