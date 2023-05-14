@extends('pointshop.layout')
@section('content')
<div class="card">
  <div class="card-header">Add a new item</div>
  <div class="card-body">
      <form action="{{ url('pointshop') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>User ID:</label></br>
        <input type="text" name="user_id" id="user_id" class="form-control"></br>
        <label>Item Name:</label></br>
        <input type="text" name="item_name" id="item_name" class="form-control"></br>
        <label>Item ID:</label></br>
        <input type="text" name="item_id" id="item_id" class="form-control"></br>
        <label>Item Code:</label></br>
        <input type="text" name="item_code" id="item_code" class="form-control"></br>
        <label>Price:</label></br>
        <input type="text" name="points" id="points" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  </div>
</div>
@stop