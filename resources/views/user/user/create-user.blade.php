@extends('layouts.master')

@section('title','Create User')

@section('content')
<div class="container">
  <div class="row marginbottom-60">
    <div class="col-md-8 offset-md-2 card bg-light margintop-10">
      {{-- form title --}}
      <div class="card-header"><h5>Create User</h5></div>
      {{-- form body --}}
      <form method="post" id="confirm" enctype="multipart/form-data">
      @csrf
      {{-- return message --}}
      @if(session('status'))
        <div class="alert alert-success">
          <strong>{{ session('status') }}</strong>
        </div>
      @endif
      {{-- name input and return error message --}}
      <div class="form-group">
        <div class="row margintop-10">
          <div class="col-md-3">
            <label for="name">Name</label>
          </div>
          <div class="col-md-8 col-11">
            <input type="text" class="form-control" id="name" name="name" 
            required autocomplete="name" autofocus>
          </div>
          <div calss="col-md-1 col-1">
            <span class="text-danger">*</span>
          </div>
        </div>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
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
            required autocomplete="email" autofocus>
          </div>
          <div calss="col-md-1 col-1">
            <span class="text-danger">*</span>
           </div>
        </div>
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      {{-- password input and return error message --}}
      <div class="form-group">
        <div class="row">
          <div class="col-md-3">
            <label for="password">Password</label>
          </div>
          <div class="col-md-8 col-11">
            <input type="password" class="form-control" id="password" 
            name="password" required autofocus>
          </div>
          <div calss="col-md-1 col-1">
            <span class="text-danger">*</span>
          </div>
        </div>
        @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       </div>
       {{-- confirm password input and return error message --}}
       <div class="form-group">
          <div class="row">
           <div class="col-md-3">
             <label for="password_confirmation">Confirm Password</label>
           </div>
           <div class="col-md-8 col-11">
             <input type="password" class="form-control" id="password_confirmation"
             name="password_confirmation" required autofocus>
           </div>
           <div calss="col-md-1 col-1">
             <span class="text-danger">*</span>
           </div>
          </div>
          @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
       </div>
       {{-- type select option and return error message --}}
       <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="type">Type</label>
            </div>
           <div class="col-md-8 col-11">
              <select class="form-control" id="type" name="type">
                @for($i=0; $i<=4; $i++)
                  <option>{{ $i }}</option>
                @endfor
              </select>
           </div>
           <div calss="col-md-1 col-1">
             <span class="text-danger">*</span>
           </div>
          </div>
          @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- phone input and return error message --}}
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="phone">Phone</label>
            </div>
            <div class="col-md-8 col-11">
              <input type="text" class="form-control" id="phone" 
              name="phone" required autofocus>
            </div>
            <div calss="col-md-1 col-1"></div>
          </div>
          @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
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
              name="dateofbirth" required autofocus>
            </div>
            <div calss="col-md-1 col-1"></div>
          </div>
          @error('dateofbirth')
            <div class="alert alert-danger">{{ $message }}</div>
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
              required autofocus></textarea>
            </div>
            <div calss="col-md-1 col-1"></div>
          </div>
          @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- image input and return error message --}}
        <div class="form-group">
          <div class="row">
            <div class="col-md-3 margintop-10">
              <label for="profile">Profile</label>
            </div>
            <div class="col-md-8 col-11">
              <div id="msg"></div>                      
                <input type="file" name="img[]" class="file" accept="image/*">
                <div class="input-group my-3">
                  <input type="text" class="form-control" disabled 
                  placeholder="Upload File" id="file">
                    <div class="input-group-append">
                      <button type="button" class="browse btn btn-primary">
                      Browse...</button>
                    </div>
                    <div class="input-group-append">
                      <span class="text-danger">*</span>
                    </div>
                  </div>  
                  </div>
                  <div class="col-md-8 col-8 offset-3">
                    <img src="https://placehold.it/80x80" id="preview" 
                    class="img-thumbnail">
                  </div>
                <div> 
              </div>
            <div calss="col-md-1 col-1"></div>
          </div>
          @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- form footer --}}
        <div class="marginbottom-15">
          <div class="row">
            <div class="col-md-9 col-7"></div>
            <div class="col-md-2 col-4">
              <div class="row">
                <div class="col-md-6 col-6">
                  <button type="button" class="btn btn-primary float-right" 
                  data-toggle="modal" data-target="#confirmCreateUser" 
                  >Confirm</button>
                </div>
                <div class="col-md-6 col-6">
                  <button onclick="form.reset()" class="btn btn-primary 
                  float-right">Clear</button>
                </div>
              </div>
            </div>
            <div class="col-md-1 col-1"></div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="confirmCreateUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Create User</h4>
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
                    <input type="text" class="form-control" id="confirmname" 
                    disabled>
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
                    disabled>
                  </div>
                  <div calss="col-md-1"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                     <label for="password">Password</label>
                  </div>
                  <div class="col-md-8">
                    <input type="password" class="form-control"  
                    id="confirmpassword" disabled>
                  </div>
                  <div calss="col-md-1"></div>
                </div>
              </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="password_confirmation">Confirm Password</label>
                </div>
                <div class="col-md-8">
                  <input type="password" class="form-control"  id="confirm-password"
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
                  <select class="form-control"  id="confirmtype" disabled>
                    @for($i=0; $i<=4; $i++)
                      <option>{{ $i }}</option>
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
                  disabled>
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
                  disabled></textarea>
                </div>
                <div calss="col-md-1"></div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group margintop-10">
              <img src="https://placehold.it/80x80" id="confirmpreview" 
              class="img-thumbnail float-right mr-5">
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6 col-6">
            <button type="submit" form="confirm" class="btn btn-primary 
            float-right">Create</button>
          </div>
          <div class="col-md-6 col-6">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
            Cancle</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
 @endsection