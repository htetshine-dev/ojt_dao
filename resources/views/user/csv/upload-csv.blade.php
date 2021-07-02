@extends('layouts.master')

@section('title', 'Upload Csv')

@section('content')
<div class="container marginbottom-180">
  <div class="row">
      <div class="col-md-6 offset-3 card bg-light margintop-100">
        <div class="card-header"><h5>Upload Csv</h5></div>
          <div class=" card-body">
            @if(session('status'))
              <div class="alert alert-success">
                <strong>{{ session('status') }}</strong>
              </div>
            @endif
            <form method="post" action="{{ __('/user/csv/upload-csv') }}" enctype="multipart/form-data">
            @csrf
              <div class="custom-file margintop-50">
                <input type="file" class="custom-file-input" id="csvFile" name="csvFile">
                <label class="custom-file-label" for="csvFile">Choose file</label>
              </div>
              @error('csvFile')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="row margintop-50">
                <div class="col-md-6">
                  <div class="form-group form-check"></div>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary float-right">Import File</button>
                </div>
            </form>            
          </div>    
        </div>    
      </div>
   </div>
</div>
</div>
  @endsection  
