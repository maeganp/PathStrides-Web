@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Announcement Details Page</div>
  <div class="card-body">


  <a href="{{ url('/announcement/') }}" class="btn btn-success btn-sm" title="Back">
                            <i class="fa fa-plus" aria-hidden="true"></i> Back
                        </a>
  
        <div class="card-body">
        <h5 class="card-title">Announcement ID : {{ $announcements-> anns_id }}</h5>
        <p class="card-text">Announcment Title : {{ $announcements->anns_title }}</p>
       
        
  </div>
  <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
    </hr>
  
  </div>
</div>