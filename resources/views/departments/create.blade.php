@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Departments Page</div>
  <div class="card-body">

  <a href="{{ url('/department/') }}" class="btn btn-success btn-sm" title="Back">
                            <i class="fa fa-plus" aria-hidden="true"></i> Back
                        </a>
    
      
      <form action="{{ url('department') }}" method="post">
        {!! csrf_field() !!}
      
        <label>Department Name:</label></br>
        <input type="text" name="admin_lname" id="admin_lname" class="form-control"></br>
        <!-- <label for="dep_coll">Department Coll :</label></br>
        <select name="dep_coll" id="dep_coll" name="dep_coll"></br>
        <option value="1">1</option></br>
        </select> -->


        <label for="admin_id">Admin Incharge:</label></br>
        <select name="admin_id" id="admin_id" name="admin_id"></br>
        @php
                    $count = 1;
                @endphp
                @foreach($admin as $item)
                    @if(($count == 1) and (old('admin') <> $item['admin_lname']))
                        <option value="{{ $item['admin_lname'] }}" selected>{{ $item['admin_lname'] }}</option>  
                    @elseif(old('dep_id') === $item['dep_id'])
                        <option value="{{ $item['admin_lname'] }}" selected>{{ $item['admin_lname'] }}</option>     
                    @else
                        <option value="{{ $item['admin_lname'] }}">{{ $item['admin_lname']}}</option>
                    @endif
                    @php
                       $count++;
                    @endphp
                @endforeach
        </select></br>
        </select></br>
        
        
        
       
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
  </div>
</div>
@stop