@extends('layouts.master')

@section('title','User Profile')

@section('content')
<div class="container">
  <div class="row marginbottom-60">
    <div class="col-md-8 offset-md-2 card bg-light margintop-10">
      {{-- title --}}
      <div class="card-header"><h5>User Profile</h5></div>
      @foreach($users as $user)
      <div class="row">
        <div class="col-md-9">
          {{-- name --}}
          <div class="form-group">
            <div class="row margintop-10">
              <div class="col-md-3">
                <label for="name">Name</label>
              </div>
              <div class="col-md-8 col-11">
                <input type="name" class="form-control"  id="name" name="name" 
                required autocomplete="name" autofocus disabled 
                value="{{ $user->name }}">
              </div>
              <div calss="col-md-1 col-1">
                <span class="text-danger">*</span>
              </div>
            </div>
            </div>
            {{-- email --}}
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="email">Email Address</label>
                </div>
                <div class="col-md-8 col-11">
                  <input type="email" class="form-control" id="email" name="email" 
                  required autocomplete="email" autofocus disabled 
                  value="{{ $user->email }}">
                </div>
                <div calss="col-md-1 col-1">
                  <span class="text-danger">*</span>
                </div>
              </div>
            </div> 
            {{-- type --}}
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="confirmpassword">Type</label>
                </div>
                <div class="col-md-8 col-11">
                  <select class="form-control" id="type" name="type" disabled>
                    <option>{{ $user->type }}</option>
                  </select>
                </div>
                <div calss="col-md-1 col-1">
                  <span class="text-danger">*</span>
                </div>
              </div>
            </div>
            {{-- phone --}}
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="phone">Phone</label>
                </div>
                <div class="col-md-8 col-11">
                  <input type="text" class="form-control" id="phone" name="phone"
                  required autofocus disabled value="{{ $user->phone}}">
                </div>
                <div calss="col-md-1 col-1"></div>
              </div>
            </div>
            {{-- date of birth --}}
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="dateofbirth">Date Of Birth</label>
                </div>
                <div class="col-md-8 col-11">
                  <input type="date" class="form-control" id="dateofbirth"
                  name="dateofbirth" required autofocus disabled 
                  value="{{ $user->date_of_birth}}">
                </div>
                <div calss="col-md-1 col-1"> </div>
              </div>
            </div>
            {{-- address --}}
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="address">Address</label>
                </div>
                <div class="col-md-8 col-11">
                  <textarea class="form-control" rows="5" id="address" 
                  name="address" required autofocus 
                  disabled>{{ $user->address }}</textarea>
                </div>
                <div calss="col-md-1 col-1"></div>
              </div>
            </div>
          </div>
          {{-- image  --}}
          <div class="col-md-3 col-11">
            <div class="form-group margintop-10">
            <img src="{{ '/uploads/images/users/'.$user->id .'/'.
            $user->profile_photo }}" id="preview" class="img-thumbnail 
            float-right">
            </div>
          </div>
        </div>
        {{-- edit button --}}
        <div class="row marginbottom-15 margintop-10">
          <div class="col-md-8">
            <a href="{{ __('/user/user/update-user/').$user->id}}">
              <button class="btn btn-primary float-right">Edit</button>
            </a>
          </div>
          <div class="col-md-4"></div>
        </div>
        @endforeach
    </div>  
  </div>
</div>
</div>
 @endsection