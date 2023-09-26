@extends('layouts.app')

@section('content')

@can('isAdmin')
   <h1>Admin section</h1>
   <a href="{{ route('getPost') }}">Get Post</a>
@endcan

@can('isUser')
   <h1>User section</h1>
@endcan
<a href="{{ route('logout') }}">Logout</a>

@endsection
