@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('admin/' .$employee->user_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Employee ID</label></br>
        <input type="text" name="user_id" id="user_id" value="{{$employee->user_id}}" id="user_id" />
        </br>
        <label>Employee First Name:</label></br>
        <input type="text" name="user_mname" id="user_mname" value="{{$employee->user_mname}}" class="form-control"></br>
        <label>Employee Middle Name:</label></br>
        <input type="text" name="user_mname" id="user_mname" value="{{$employee->user_mname}}" class="form-control"></br>
        <label>Employee Last Name:</label></br>
        <input type="text" name="user_lname" id="user_lname" value="{{$employee->user_lname}}" class="form-control"></br>
        <label>Employee Email</label></br>
        <input type="text" name="user_email" id="user_email" value="{{$employee->user_email}}" class="form-control"></br>
        <label>Contact Number</label></br>
        <input type="text" name="contactnumber" id="contactnumber" value="{{$employee->contactnumber}}" class="form-control"></br>
        <label for="dep_name">Department :</label></br>
        <select name="dep_name" id="dep_name" name="dep_name"></br>
        @php
                    $count = 1;
                @endphp
                @foreach($department as $item)
                    @if(($count == 1) and (old('department') <> $item['dep_name']))
                        <option value="{{ $item['dep_name'] }}" selected>{{ $item['dep_name'] }}</option>  
                    @elseif(old('dep_id') === $item['dep_id'])
                        <option value="{{ $item['dep_name'] }}" selected>{{ $item['dep_name'] }}</option>     
                    @else
                        <option value="{{ $item['dep_name'] }}">{{ $item['dep_name']}}</option>
                    @endif
                    @php
                       $count++;
                    @endphp
                @endforeach
        </select></br>

         
        <label for="role">Role :</label></br>
        <select name="role" id="role" name="role"></br>
        <option value="Manager">Manager</option></br>
        <option value="Employee">Employee</option></br>
        </select></br>

        <label for="status">Status :</label></br>
        <select name="status" id="status" name="status"></br>
        <option value="Present">Employed</option></br>
        <option value="Terminated">Terminated</option></br>
        </select></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop