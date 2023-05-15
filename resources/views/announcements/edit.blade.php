@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
  <form action="{{ url('announcement/' .$announcements->anns_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Announcement Title:</label></br>
        <input type="text" name="anns_title" id="anns_title" value="{{$announcements->anns_title}}" class="form-control"></br>
        <label>Announcement Description:</label></br>
        <input type="text" name="anns_desc" id="anns_desc" value="{{$announcements->anns_desc}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
  <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
</div>
@stop