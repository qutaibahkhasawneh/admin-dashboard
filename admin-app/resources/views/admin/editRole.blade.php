@extends('admin.layout')

@section('content')

<form style="margin-top: 50px" action="{{ route('update-role') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$roleData->id}}" >

    <div class="form-group">

      <input name="name" type="text" class="form-control"  placeholder="Enter the Name of role" value="{{ $roleData->name }}">
      <br>
      <span class="text-danger">@error('name') {{$message}}@enderror </span>
      <label for="exampleInputPassword1">Name of role</label>
    </div>

    <button type="submit" class="btn btn-outline-warning">Update Role</button>
  </form>
@endsection
