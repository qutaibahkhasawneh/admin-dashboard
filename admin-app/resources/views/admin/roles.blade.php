@extends('admin.layout')

@section('content')

<div class="container" style="margin-top: 60px">
    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif

<a href="{{ route('create-roles') }}" class="btn btn-outline-warning" style="color:rgb(170, 137, 74)">Add role</a>
<table class="table" style="margin-top: 20px">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
        $i= 1
        @endphp
      <tr>
        @foreach ($role as $items )

        <th scope="row">{{ $i++ }}</th>
        <td>{{$items->name}}</td>

        <td>
            <a href="{{url('edit_role/'.$items->id)}}" class="btn btn-dark">edit</a>
            <a href="{{url('delete_role/'.$items->id)}}" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

</div>



@endsection
