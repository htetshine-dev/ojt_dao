@extends('layouts.master')

@section('title','Update User')

@section('content')
<div class="container">
  <div class="row marginbottom-60">
    <div class="col-md-8 offset-md-2 card bg-light margintop-10 marginbottom-60">
      {{-- form title --}}
      <div class="card-header"><h5>Update User</h5></div>
      @foreach($users as $user)
      {{-- form body --}}
      <form method="post" id="confirm" enctype="multipart/form-data">
      {{-- return error message --}}
      @if(session('status'))
        <div class="alert alert-success">{{  session('status') }}</div>
      @endif
      @csrf
      <div class="row marginbottom-15">
        <div class="col-md-9">
          {{-- name input and return error message --}}
          <div class="form-group">
            <div class="row margintop-10">
              <div class="col-md-3">
                <label for="name">Name</label>
              </div>
              <div class="col-md-8 col-11">
                <input type="name" class="form-control"  id="name" name="name" 
                required autocomplete="name" autofocus value="{{ $user->name }}">
              </div>
              <div calss="col-md-1 col-1">
                <span class="text-danger">*</span>
              </div>
            </div>
            @error('name')
              <div class="alert alert-danger">
                <span>{{ $message }}</span>
              </div>
            @enderror
          </div>
          {{-- email input and return error message --}}
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label for="email">Email Address</label>
              </div>
              <div class="col-md-8 col-11">
                <input type="email" class="form-control" id="email" name="email" 
                required autocomplete="email" autofocus value="{{ $user->email }}">
              </div>
              <div calss="col-md-1 col-1">
                <span class="text-danger">*</span>
              </div>
            </div>
            @error('email')
              <div class="alert alert-danger">
                <span>{{ $message }}</span>
              </div>
            @enderror
          </div>
          {{-- type input and return error message --}}            
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label for="confirmpassword">Type</label>
              </div>
              <div class="col-md-8 col-11">
                <select class="form-control" id="type" name="type">
                  @for($i=0; $i<=4; $i++)
                    <option @if($i==$user->type){{ 'selected' }}@endif>
                    {{ $i }}</option>
                  @endfor
                </select>
              </div>
              <div calss="col-md-1 col-1">
                <span class="text-danger">*</span>
              </div>
            </div>
            @error('type')
              <div class="alert alert-danger">
                <span>{{ $message }}</span>
              </div>
            @enderror
          </div>
          {{-- phone input and return error message --}}
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label for="phone">Phone</label>
              </div>
              <div class="col-md-8 col-11">
                <input type="text" class="form-control" id="phone" name="phone" 
                required autofocus value="{{ $user->phone }}">
              </div>
              <div calss="col-md-1 col-1"></div>
            </div>
            @error('phone')
              <div class="alert alert-danger">
                <span>{{ $message }}</span>
              </div>
            @enderror
          </div>
          {{-- date of birth input and return error message --}}
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label for="dateofbirth">Date Of Birth</label>
              </div>
              <div class="col-md-8 col-11">
                <input type="date" class="form-control" id="dateofbirth" 
                name="dateofbirth" required autofocus 
                value="{{ $user->date_of_birth }}">
              </div>
              <div calss="col-md-1 col-1"></div>
            </div>
            @error('dateofbirth')
              <div class="alert alert-danger">
                <span>{{ $message }}</span>
              </div>
            @enderror
          </div>
          {{-- address input and return error message --}}
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label for="address">Address</label>
              </div>
              <div class="col-md-8 col-11">
                <textarea class="form-control" rows="5" id="address" name="address"
                required autofocus>{{ $user->address }}</textarea>
              </div>
              <div calss="col-md-1 col-1"></div>
            </div>
            @error('address')
              <div class="alert alert-danger">
                <span>{{ $message }}</span>
              </div>
            @enderror
          </div>
            {{-- change password link  --}}
            <div class="form-group">
              <a href="{{ '/user/user/change-password/' }}{{ $user->id }}">
              Change Password</a>
            </div> 
          </div>
        {{-- image input and return error message --}}
        <div class="col-md-3 col-11">
          <div id="msg"></div>
          <div class="form-group margintop-10  float-right">
            <img src="{{ '/uploads/images/users/'.$user->id.'/'.
            $user->profile_photo }}" id="image" name="image" 
            class="img-thumbnail mr-5">
          </div>                      
          <input type="file" name="img[]" class="file" accept="image/*">
            <div class="input-group my-3">
              <input type="text" class="form-control" disabled 
              placeholder="Upload File" id="file">
              <div class="input-group-append">
                <button type="button" class="browse btn btn-primary">
                Browse...</button>
            </div>
          </div>  
          @error('img')
            <div class="alert alert-danger">
              <span>{{ $message }}</span>
            </div>
          @enderror
        </div>          
      </div>
      {{-- form footer --}}
      <div class="row marginbottom-15">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-10 col-10">
              <button type="button" class="btn btn-primary float-right" 
              data-toggle="modal" data-target="#confirmUpdateUser">
            Confirm</button>
            </div>
            <div class="col-md-2 col-2">
              <button type="button" onclick="reset()" class="btn btn-primary 
              float-right">Clear</button>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>   
      </form>
      @endforeach
    </div>
  </div>
</div>
</div>

{{-- Modal --}}
<div class="modal fade" id="confirmUpdateUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Update User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post">
      @csrf
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <div class="row margintop-10">
                <div class="col-md-3">
                  <label for="name">Name</label>
                </div>
                <div class="col-md-8">
                  <input type="name" class="form-control"  id="confirmname" 
                  name="confirmname" required autocomplete="name" autofocus disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="email">Email Address</label>
                </div>
                <div class="col-md-8">
                  <input type="email" class="form-control"  id="confirmemail" 
                  name="confirmemail" required autocomplete="email" autofocus 
                  disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>           
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="type">Type</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control"  id="confirmtype" name="confirmtype" 
                  disabled>
                    @for($i=0; $i<=4; $i++)
                      <option @if($i==$user->type){{ 'selected' }}@endif>
                      {{ $i }}</option>
                    @endfor
                  </select>
                </div>
                  <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="phone">Phone</label>
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control"  id="confirmphone" 
                  name="confirmphone" required autocomplete="phone" autofocus 
                  disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="dateofbirth">Date Of Birth</label>
                </div>
                <div class="col-md-8">
                  <input type="date" class="form-control"  id="confirmdob" 
                  name="confirmdob" required autocomplete="confirmdob" 
                  autofocus disabled>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="address">Address</label>
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" rows="5" id="confirmaddress" 
                  name="confirmaddress" required autocomplete="address" autofocus
                  disabled></textarea>
                </div>
                <div calss="col-md-1"></div>
              </div>
               </div>
            </div>
            <div class="col-md-3 col-12">
              <div class="form-group margintop-10">
                <center>
                <img src="{{ '/uploads/images/users/'.$user->id.'/'.
                $user->profile_photo }}" id="confirmimage" class="img-thumbnail 
                float-right">
                </center>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer marginbottom-15">
          <div class="row">
            <div class="col-md-6 col-6">
              <button type="submit" form="confirm" class="btn btn-primary 
              float-right">Update</button>
            </div>
            <div class="col-md-6 col-6">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
 @endsection