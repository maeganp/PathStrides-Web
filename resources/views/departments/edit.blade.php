@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('department/' .$departments->dep_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
      
        <label>Department Name:</label></br>
        <input type="text" name="dep_name" id="dep_title" value="{{$departments->ann_title}}" class="form-control"></br>
       
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
  <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
</div>
@stop