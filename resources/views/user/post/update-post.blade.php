@extends('layouts.master')
@section('title','Update Post')
@section('content')
{{-- Main content --}}
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10 marginbottom-60">
      {{-- Form title --}}
      <div class="card-header"><h5>Update Post</h5></div>
      {{-- Form body --}}
      <form method="post" id="confirm">
        @csrf
        {{-- Success message for post update --}}
        @if(session('status'))
          <div class="alert alert-success">
            <strong>{{ session('status') }}</strong>
          </div>
        @endif
        {{-- Loop for each posts data as post data --}}
        @foreach($posts as $post)
          {{-- Lable, input and required for title of form  --}}
          <div class="form-group">
            <label for="title">Title:</label>
            <div class="row">
              <div class="col-md-11">
                <input type="text" class="form-control @error('title') is-invalid 
                @enderror" value="{{ $post->title }}" placeholder="Enter Title" 
                id="title" name="title" required autocomplete="title" autofocus>
              </div>
              <div class="col-md-1">
                <span class="text-danger">*</span>
              </div>
            </div>
          </div>
          {{-- Label, input and required for comment of form --}}
          <div class="form-group">
            <label for="comment">Comment:</label>
            <div class="row">
              <div class="col-md-11">
                <textarea class="form-control @error('comment') is-invalid @enderror"
                rows="13" id="comment" name="comment" required autocomplete="comment"
                autofocus>{{ $post->description }}</textarea>
              </div>
              <div class="col-md-1">
                <span class="text-danger">*</span>
              </div>
            </div>   
          </div>
          {{-- Checkbox for status of form --}}
          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                Status:
              </div>
              <div class="col-md-10">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="status" 
                  name="status" @if($post->status=='1') checked @endif> 
                  <span class="custom-control-indicator"></span>
                </label>
              </div>
            </div>
          </div>
        @endforeach
        {{-- Form footer --}}
        <div class="row marginbottom-15">
          <div class="col-md-2 offset-md-9">
            <div class="row">
              <div class="col-md-6">
                {{-- Button for confirm update post --}}
                <button type="button" class="btn btn-primary float-right"
                data-toggle="modal" data-target="#confirmUpdatePost" >
                Confirm</button>
              </div>
              <div class="col-md-6">
                {{-- Button for clear value of form and set default --}}
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
<!-- Post Update Confirm Modal -->
<div class="modal fade" id="confirmUpdatePost">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Update Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post">
        @csrf
        <!-- Modal body -->
        <div class="modal-body">
          {{-- Label, input and required for title of confirm modal --}}
          <div class="form-group">
            <label for="title">Title:</label>
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control @error('title') is-invalid
                  @enderror" id="title" name="title" required  autofocus disabled>
                </div>
              </div> 
          </div>
          {{-- Label, input and required for comment of confirm modal --}}
          <div class="form-group">
            <label for="comment">Comment:</label>
            <div class="row">
              <div class="col-md-12">
                <textarea class="form-control @error('comment') is-invalid 
                @enderror" rows="5" id="comment" name="comment" required autofocus 
                disabled></textarea>
              </div>
            </div>   
          </div>
          {{-- Checkbox for status of confirm modal --}}
          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                Status:
              </div>
              <div class="col-md-10">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="status2" 
                  name="status" ><span class="custom-control-indicator"></span>
                </label>
              </div>
            </div>
          </div>   
        </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6">
            {{-- Button for update confirm --}}
            <button type="submit" form="confirm" class="btn btn-primary 
            float-right">Confirm</button>
          </div>
          <div class="col-md-6">
            {{-- Button for cancle confirm --}}
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