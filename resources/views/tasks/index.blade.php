
@extends('layouts.employeelayout')
@section('content')
<div class="row" id="employee-container">
            <div class="col" id="employee-container">
                <div class="card">
                    <div class="card-header">
                        <div class="row" id="card-header">
                            <div class="col">
                                <h2 class="titles">Tasks</h2>
                            </div>
                        </div>

                        <div class="col">
                        <a onclick="$('#createTaskModal').modal('show')" class="add" title="Add New task">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <br/>
                        <div class="table-responsive" id="realtime">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Task ID</th>
                                        <th>Task Title</th>
                                        <th>Points</th>
                                        <th>Location</th>
                                        <th>Coordinates</th>
                                        <th>Employee Incharge</th>
                                        <th>Status</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->task_title }} </td>
                                        <td>{{ $item->points }} </td>
                                        <td>{{ $item->address }} </td>
                                        <td>{{ $item->lat }}, {{ $item->lng }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->status }}</td>
                            
                                        <td>
                                            <a href="{{ url('/task/' . $item->task_id) }}" title="View task"><button class="btn btn-info btn-sm" id="actbtn"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/task/' . $item->task_id . '/edit') }}" title="Edit task"><button class="btn btn-primary btn-sm" id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                            <form method="POST" action="{{ url('/task' . '/' . $item->task_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm" id="actbtn" title="Delete task" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="createTaskModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTaskModalLabel">Create Task</h5>
        <button type="button" class="close" onclick="$('#createTaskModal').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="createTaskForm">
        <label>Task Title:</label></br>
        <input type="text" name="task_title" id="task_title" class="form-control"></br>
        <label>Task Description:</label></br>
        <input type="text" name="task_desc" id="task_desc" class="form-control"></br>
        <label>Points:</label></br>
        <input type="text" name="points" id="points" class="form-control"></br>
        <label>Address:</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <div id="map" style="height:600px; width: 770px;" class="my-3"></div>
        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
        <label>Deadline:</label></br>
        <input type="date" name="deadline" id="deadline" class="form-control"></br>
        <label for="status">Status :</label></br>
        <select name="status" id="status" name="status"></br>
        <option value="Pending">Pending</option></br>
        </select></br>
       
        
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#createTaskModal').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="createTask()">Create</button>
      </div>
    </div>
  </div>
</div>


@foreach($tasks as $item)
<!-- Modal Edit-->
<div class="modal fade" id="editTaskModal{{$item->dep_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
        <button type="button" class="close" onclick="$('#editTaskModal{{$item->dep_id}}').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="editTaskForm">

            <div class="form-group">
             @method('PUT')
                <input type="text" name="dep_id" id="dep_id" value="{{$item->dep_id}}"hidden >
                <label for="dep_name">Task Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" value="{{$item->dep_name}}" required >
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#editTaskModal{{$item->dep_id}}').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="createTask({{$item->dep_id}})">Edit</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
    
    function createTask() {
        // Get the form data
        let formData = new FormData(document.getElementById('createTaskForm'));

        // Send the form data to the server using Axios
        axios.post('/task', formData)
            .then(response => {
                // Handle the successful response
                alert('Task created successfully!');
                $('#createTaskModal').modal('hide');
                getTask();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error creating the Task!');
            });
    }

    function editTask(id) {
        // Get the form data
        let formData = new FormData(document.getElementById('editTaskForm'));
        const dep_id=formData.get('dep_id');
        const dep_name=formData.get('dep_name')

        // Send the form data to the server using Axios
        console.log(formData);
        axios.put('/task/'+id, {
            dep_id:dep_id,
            dep_name:dep_name
        })
        
            
            .then(response => {
                // Handle the successful response
                alert('task edited successfully!');
                $('#editTaskModal').modal('hide');
                getTask();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error editing the Task!');
            });
    }

    function getTask(){
        axios.get('/task/getAll')
    .then(response => {
      showTasks(response.data);
      
    })
    .catch(error => {
      console.log(error);
    });
    }


    function showTasks(task){
        console.log(task);
        let variable=document.getElementById('realtime');
        variable.innerHTML='';
        variable.innerHTML+='<table class="table" >'+
        '<thead><tr><th>Task ID<th>Task Title<th>Task Description<th>Points<th>Location<th>Coordinates<th>Employee Incharge<th>Status<th>Deadline</th></th></th></th></th><th>Actions</th></th></th></tr></thead><tbody id="inside">';
        let body=document.getElementById('inside');
        for(i in task)
        {
            body.innerHTML+='<tr><td>'+task[i].task_id+'</td>'+'<td>'+task[i].task_title+'</td>'+'<td>'+task[i].task_desc+'</td>'+'<td>'+task[i].points+'</td>'+ 
           '<td>'+task[i].address+'<td>'+task[i].lat+', '+task[i].lng+'</td></td>'+'<td>'+task[i].user_id+'</td>'+ '<td>'+task[i].status+'</td>'+ '<td>'+task[i].deadline+'</td>'+
           '<td><a href=""><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>'+
           '<button type="submit" class="btn btn-sm" id="actbtn" title="Delete department" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button></td></tr>';
           
        }
        variable.innerHTML+='</tbody></table>';
        

       
    }

  
</script>

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



@endsection

