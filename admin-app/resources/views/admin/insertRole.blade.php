@extends('admin.layout')

@section('content')



<form style="margin-top: 50px" action="{{ route('added-roles') }}" method="post">
    @csrf


    <div class="form-group">

      <input name="name" type="text" class="form-control"  placeholder="Name of role">
      <br>
      <span class="text-danger">@error('name') {{$message}}@enderror </span>
      <label for="exampleInputPassword1">Name of role</label>
    </div>

    <button type="submit" class="btn btn-outline-warning">Add Role</button>
  </form>
@endsection
