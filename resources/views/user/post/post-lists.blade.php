@extends('layouts.master')
@section('title','Post Lists')
@section('content')
{{-- Main Content --}}
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1 card bg-light margintop-10 marginbottom-60">
      {{-- Title --}}
      <div class="card-header"><h5>Post Lists</h5></div>
      <div class="card-body">
        <div class="row margintop-10">
          <div class="col-md-3">
            {{-- Form For Search Box --}}
            <form method="post" action="{{ url('/user/post/search') }}">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="title" id="title" 
                placeholder="Search">
                <div class="input-group-append">
                  {{-- Search Button --}}
                  <button type="submit" class="btn btn-primary">Go</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-4">
                {{-- Link For Add --}}
                <a href="/user/post/create-post" class="href">
                  <button type="button" class="btn btn-primary float-right">
                  Add</button>
                </a>
              </div>
              <div class="col-md-4">
                {{-- Link For Upload --}}
                <a href="/user/csv/upload-csv" class="href">
                  <button type="button" class="btn btn-primary float-right">
                  Upload</button>
                </a>
              </div>
              <div class="col-md-4">
                <a href="#" class="href">
                  <button type="button" onclick="excelDownload()" 
                  class="btn btn-primary float-right">
                  Download</button> 
                </a>
              </div>
            </div>
          </div>
        </div>
        <hr/>
        {{-- Success Message For Delete --}}
        @if(session('status'))
          <div class="alert alert-success">
            <strong>{{ session('status') }}</strong>
          </div>
        @endif 
        <div id="tableWrap" class="table-responsive-sm">
        <table class="table table-hover" id="myTable">
          {{-- Table Header --}}
          <thead>
            <tr>
              <th>Post Title</th>
              <th>Post Description</th>
              <th>Posted User</th>
              <th>Posted Date</th>
              <th></th><th></th>
            </tr>
          </thead>
          {{-- Table Body --}}
          <tbody>
            {{-- if the number of post is not null --}}
            @if(count($posts)!='')
              {{-- looped for each posts data as post data --}}
              @foreach($posts as $post)
                <tr>
                  {{-- Column for Title --}}
                  <td id="title">
                    {{-- Link For View Modal Box --}}
                    {{-- <form method="post" action="" id="view"> --}}
                    <a href="{{ __('/user/post/update-post/') }}{{ $post->id }}" 
                      data-toggle="modal" data-target="#viewModal" 
                      onclick="showDetail({{$post}})">
                    {{ $post->title }}</a>
                    {{-- </form> --}}
                  </td>
                  {{-- Column for Comment --}}
                  <td>{{ $post->description }}</td>
                  {{-- Column for Posted User --}}
                  <td>@if($post->created_user_id==1) Admin @endif</td>
                  {{-- Column for Posted Date --}}
                  <td>{{ $post->created_at }}</td>
                  {{-- Column for Edit Post --}}
                  <td ><a href="{{ __('/user/post/update-post/') }}{{ $post->id }}">
                  Edit</a></td>
                  {{-- Column for Delete Post --}}
                  <td>
                    <button type="button" class="btn btn-primary float-right" 
                    data-toggle="modal" data-target="#confirmDeletePost" 
                    onclick="confirmDelete({{$post->id}})">
                    Delete</button>
                  
                  </td>
                </tr>
              @endforeach
            {{-- if the number of post is null --}}  
            @else
              <tr>
                <td class="text-center alert alert-danger" colspan="6">
                   There is no post of search result.
                </td>
              </tr>
            @endif  
          </tbody>
        </table>
        </div>
          {{-- Pagination for list and search of posts --}}
          <ul class="pagination  justify-content-center marginbottom-15">
            {{ $posts->links() }}
          </ul>
        </div>
    </div>
  </div>
</div>
<!-- Delete Confirm Modal -->
<div class="modal fade" id="confirmDeletePost" tabindex="-1" role="dialog"
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- Modal Header --}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- Modal Body --}}
      <div class="modal-body">
        <form mehtod="post"  id="confirm">
        {{method_field('delete')}}
        @csrf
        {{-- <a href="#" data-toggle="modal" 
        data-target="#confirmDeletePost">Delete</a></td> --}}
        </form>
        <center>
          Are you sure you want to delete? 
        </center>
      </div>
      {{-- Modal Footer --}}
        <div class="modal-footer">
          {{-- Button for Cancel --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cancel</button>
          {{-- Button for Confirm --}}
          <button type="submit" form="confirm" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Post View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" 
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- Modal Header --}}
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" 
        aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- Modal Body --}}
      <div class="modal-body">  
        <div class="form-group">
          <label for="title">Title:</label>
          <div class="row">
            <div class="col-md-12">
              <input type="text" class="form-control" value="" id="title" 
              name="title" required disabled>
            </div>
          </div>
        </div>
        {{-- Post Comment --}}
        <div class="form-group">
          <label for="comment">Comment:</label>
          <div class="row">
            <div class="col-md-12">
              <textarea class="form-control"  rows="13" id="comment" name="comment"
              required disabled></textarea>
            </div>
          </div>   
        </div>   
      </div>
      {{-- Modal Footer --}}
      <div class="modal-footer">
        {{-- Button for Close --}}
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

