@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('task/' .$task->task_id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Task Title:</label></br>
        <input type="text" name="task_title" id="task_title" value="{{$task->task_title}}" class="form-control"></br>
        <label>Task Description:</label></br>
        <input type="text" name="task_desc" id="task_desc" value="{{$task->task_desc}}" class="form-control"></br>
        <label>Points:</label></br>
        <input type="text" name="points" id="points" value="{{$task->points}}" class="form-control"></br>
        <label>Address:</label></br>
        <input type="text" name="address" id="address" value="{{$task->address}}" class="form-control"></br>
        <label>Deadline:</label></br>
        <input type="date" name="deadline" id="deadline" value="{{$task->deadline}}" class="form-control"></br>
        <label for="status">Status :</label></br>
        <select name="status" id="status" name="status"></br>
        <option value="Pending">Pending</option></br>
        <option value="Completed">Completed</option></br>
        </select></br>

        <script>
    let map;

    
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 10.3333, lng: 123.7500 },
            zoom: 8,
            scrollwheel: true,
        });
        const uluru = { lat: 10.3333, lng: 123.7500 };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker,'position_changed',
            function (){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })
        
        google.maps.event.addListener(map,'click',
        function (event){
            pos = event.latLng
            marker.setPosition(pos)
        })
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUxlxBL-MdWP03LiKws3eP997Ka93m04Y&callback=initMap"
        type="text/javascript"></script>
       
        
        <label for="user_id">Employee Incharge:</label></br>
        <select name="user_id" id="user_id" name="user_id"></br>
        @php
                    $count = 1;
                @endphp
                @foreach($employee as $item)
                    @if(($count == 1) and (old('user_id') <> $item['user_id']))
                        <option value="{{ $item['user_id'] }}" selected>{{ $item['user_lname'] }}</option>  
                    @elseif(old('user_id') === $item['user_id'])
                        <option value="{{ $item['user_id'] }}" selected>{{ $item['user_lname'] }}</option>     
                    @else
                        <option value="{{ $item['user_id'] }}">{{ $item['user_lname']}}</option>
                    @endif
                    @php
                       $count++;
                    @endphp
                @endforeach
        </select></br>
        
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
  </div>
</div>


@stop