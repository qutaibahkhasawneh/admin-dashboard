@extends('admin.link')

@section('content')

<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('added_user') }}" enctype="multipart/form-data">
            @csrf

            <br>
            <div class="form-group">
                <label for="formGroupExampleInput"> Name of user</label>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{ old('name') }}">
                <span class="text-danger">@error('name') {{$message}}@enderror </span>
              </div><br>

            <div class="form-group">
                <label for="formGroupExampleInput"> Email</label>
                <input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{$message}}@enderror </span>
              </div><br>

              <div class="form-group">
                <label for="formGroupExampleInput2">Phone</label>
                <input type="number" class="form-control" name="phone_number" placeholder="Phone number" value="{{ old('phone_number') }}">
                <span class="text-danger">@error('phone_number') {{$message}}@enderror </span>
              </div>

              <div class="form-group"><br>
                <label for="formGroupExampleInput2"> image</label>
                <input type="file" class="form-control" name="personal_photo" placeholder="" value="{{ old('personal_photo') }}">
                <span class="text-danger">@error('personal_photo') {{$message}}@enderror </span>
              </div>
              @foreach ($role as $item)
              <div class="form-check">
                <input name='roles[]' class="form-check-input" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $item->name }}
                </label>
              </div>
              @endforeach

            <button class="btn btn-warning" type="submit">Add user</button>

            </form>

        </div>
    </div>
</div>

@endsection


