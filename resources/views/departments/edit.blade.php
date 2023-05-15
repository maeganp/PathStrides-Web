@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('department/' .$departments->dep_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <div class="form-group">
                <input type="text" name="dep_id" id="dep_id" value="{{$departments->dep_id}}"hidden >
                <label for="dep_name">Department Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" value="{{$departments->dep_name}}" required >
            </div>
       
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
  <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
</div>
@stop