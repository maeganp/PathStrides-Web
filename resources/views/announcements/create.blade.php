@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Announcements Page</div>
  <div class="card-body">

  <a href="{{ url('/announcement/') }}" class="btn btn-success btn-sm" title="Back">
                            <i class="fa fa-plus" aria-hidden="true"></i> Back
                        </a>
    
      
      <form action="{{ url('announcement') }}" method="POST" enctype="multipart/form-data" name="formName">
        {!! csrf_field() !!}
        <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="anns_title" name="anns_title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="anns_desc" name="anns_desc"></textarea>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
  </div>
</div>
@stop