@extends('layouts.master')
@section('title','Create Post')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10 marginbottom-60">
      <div class="card-header"><h5>Create Post</h5></div>
      <form method="post" id="confirm">
        @csrf
        @if(session('status'))
          <div class="alert alert-success">
            <strong>{{ session('status') }}</strong>
          </div>
        @endif
        <div class="form-group">
          <label for="title">Title:</label>
          <div class="row">
            <div class="col-md-11">
              <input type="text" class="form-control" placeholder="Enter Title"
              id="title" name="title" required autocomplete="title" autofocus>
              @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-1">
              <span class="text-danger">*</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <div class="row">
            <div class="col-md-11">
              <textarea class="form-control" placeholder="Enter Comment" rows="13"
              id="comment" name="comment" required autocomplete="comment" 
              autofocus></textarea>
              @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-1">
              <span class="text-danger">*</span>
            </div>
          </div>   
        </div>
        <div class="row marginbottom-15">
          <div class="col-md-2 offset-md-9">
            <div class="row">
              <div class="col-md-6">
                <button type="button" class="btn btn-primary float-right"
                data-toggle="modal" data-target="#confirmCreatePost">Confirm
                </button>
              </div>
              <div class="col-md-6">
                <button type="button" onclick="reset()" class="btn btn-primary
                float-right">Clear</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="confirmCreatePost">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post">
        @csrf
        <div class="modal-body"> 
          <div class="form-group">
            <label for="title">Title:</label>
            <div class="row">
              <div class="col-md-12">
                <input type="text" class="form-control" id="title" name="title" 
                required disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="comment">Comment:</label>
            <div class="row">
              <div class="col-md-12">
                <textarea class="form-control" rows="13" id="comment" name="comment"
                required disabled></textarea>
              </div>
            </div>   
          </div>        
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-6">
              <button type="submit" form="confirm" class="btn btn-primary 
              float-right">Create</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-danger float-right" 
              data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
 

