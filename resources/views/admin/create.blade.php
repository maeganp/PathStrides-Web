@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Employees Page</div>
  <div class="card-body">
      
      <form action="{{ url('admin') }}" method="post">
        {!! csrf_field() !!}
        <label>First Name:</label></br>
        <input type="text" name="user_fname" id="user_fname" class="form-control"></br>
        <label>Middle Name:</label></br>
        <input type="text" name="user_mname" id="user_mname" class="form-control"></br>
        <label>Last Name:</label></br>
        <input type="text" name="user_lname" id="user_lname" class="form-control"></br>
        <label>Email:</label></br>
        <input type="text" name="user_email" id="user_email" class="form-control"></br>
        <label>Contact Number:</label></br>
        <input type="text" name="contactnumber" id="contactnumber" class="form-control"></br>
        <label>Employee Username:</label></br>
        <input type="text" name="user_username" id="user_username" class="form-control"></br>
        <label>Employee Password:</label></br>
        <input type="text" name="user_password" id="user_password" class="form-control"></br>
        <label>Points:</label></br>
        <input type="text" name="user_points" id="user_points" class="form-control"></br>
       
       
        <label for="dep_id">Department :</label></br>
        <select name="dep_id" id="dep_id" name="dep_id"></br>
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
        </select></br>
        
        <label for="role">Role :</label></br>
        <select name="role" id="role" name="role"></br>
        <option value="Manager">Manager</option></br>
        <option value="Employee">Employee</option></br>
        </select></br>

        <label for="status">Status :</label></br>
        <select name="status" id="status" name="status"></br>
        <option value="Present">Present</option></br>
        <option value="Terminated">Terminated</option></br>
        </select></br>

        
       
        
       
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  </div>
</div>
@stop