@extends('layouts.master')

@section('title','User Lists')

@section('content')
<div class="container">
  <div class="row marginbottom-15">
    <div class="col-md-10 offset-md-1 card bg-light margintop-10">
      {{-- form title --}}
      <div class="card-header"><h5>User Lists</h5></div>
        <div class="card-body">
          {{-- form for search --}}
          <form method="post" action="/user/user/search">
          @csrf
            <div class="row margintop-10">
              <div class="col-md-2">
                <input type="text" name="name" id="name" placeholder="Name" 
                class="form-control"/>
              </div>
              <div class="col-md-2">
                <input type="email" name="email" id="email" placeholder="Email" 
                class="form-control"/>
              </div>
              <div class="col-md-2">
                <input type="text" name="createdfrom" id="createdfrom" 
                placeholder="Created From" class="form-control"/>
              </div>
              <div class="col-md-2">
                <input type="text" name="createdto" id="createdto" 
                placeholder="Created To" class="form-control"/>
              </div>
              <div class="col-md-2 col-2">
                <button type="submmit" class="btn btn-primary">Search</button>
              </div>
              <div class="col-md-2 col-10">
                <a href="{{ __('/user/user/create-user') }}">
                  <button type="button" class="btn btn-primary">Add</button>
                </a>
              </div>
            </div>
          </form>
          <hr/>
          {{-- return message --}}
          @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          {{-- user table --}}
          <table class="table table-light table-striped table-responsive-md" >
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created User</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Created Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if(count($users)!='')
                @foreach($users as $user)
                <tr>
                <td><a href="{{ __('/user/user/profile/') }}{{ $user->id }}">
                  {{ $user->name }}</a>
                </td>
                <td>{{ $user->email }}</td>
                <td>@if($user->type==1){{ "User" }}@else {{ "Admin" }} @endif</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->date_of_birth }}</td>
                <td>{{ $user->created_at }}</td>
                <td><button type="button" class="btn btn-primary float-right" 
                  data-toggle="modal" data-target="#confirmDeleteUser" 
                  onclick="confirmDeleteUser({{$user->id}})">
                  Delete</button>
                </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td class="text-center alert alert-danger" colspan="6">
                    There is no user of search result.</td>
                </tr>
              @endif  
            </tbody>
          </table>
            {{-- Pagination for list and search of users --}}
            <ul class="pagination  justify-content-center">
              {{ $users->links() }}
            </ul>
    </div>
  </div>
</div>
</div>

<!-- Delete Confirm Modal -->
<div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog"
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
@endsection