@extends('admin.layout')

@section('content')

<div class="container" style="margin-top: 60px">
    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif

<a href="{{ url('create-user') }}" class="btn btn-outline-warning" style="color:rgb(170, 137, 74)">Add user</a>
<table class="table" style="margin-top: 20px">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Photo</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
        $i= 1
        @endphp
      <tr>
        @foreach ($user as $items )

        <th scope="row">{{ $i++ }}</th>
        <td>{{$items->name}}</td>
        <td>{{$items->phone_number}}</td>
        <td>{{$items->email}}</td>
        <td><img src="{{asset('PostsImage/'.$items->personal_photo)}}" style="height: 30px"></td></td>
        <td><a href="{{url('edit_user/'.$items->id)}}" class="btn btn-dark">edit</a>
            <a href="{{url('delete_user/'.$items->id)}}" class="btn btn-danger">delete</a>
        </td>


      </tr>
      @endforeach

    </tbody>
  </table>

</div>
@endsection
