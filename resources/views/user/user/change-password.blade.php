@extends('layouts.master')

@section('title','Change Password')

@section('content')
<div class="container marginbottom-60">
  <div class="row">
    <div class="col-md-6 offset-3 card bg-light margintop-100">
      {{-- form title --}}
      <div class="card-header"><h5>Change Password</h5></div>
      <div class=" card-body">
      {{-- form body --}}
      <form method="post">
        {{-- return message --}}
        @if(session('status'))
          <div class="alert alert-success">{{  session('status') }}</div>
        @endif
        @csrf
        {{-- current password input and return error message --}}
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Current Password" 
          name="currentpassword" id="currentpassword">
          @error('currentpassword')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- new password input and return error message --}}
        <div class="form-group">
          <input type="password" class="form-control" placeholder="New password" 
          name="password" id="password">
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- confirm password input and return error message --}}
        <div class="form-group">
          <input type="password" class="form-control" 
          placeholder="Confirm New password" name="password_confirmation" 
          id="password_confirmation">
          @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- form footer --}}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group form-check"></div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-9">
                <button type="submit" class="btn btn-primary float-right">
                Change</button>
              </div>
              <div class="col-md-3">
                <button  type="button" onclick="reset()" class="btn btn-primary
                float-right">Clear</button>
              </div>
            </div>            
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
 @endsection