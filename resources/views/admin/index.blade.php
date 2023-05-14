
@extends('layouts.employeelayout')
@section('content')


<div class="row" id="employee-container">
            <div class="col" id="employee-container">
                <div class="card">
                    <div class="card-header">


                        <div class="row" id="card-header">
                            <div class="col">
                                <h2 class="titles">Employees</h2>
                            </div>
                        </div>
                        @if($data->role=='Manager')
                        @else
                        <div class="col">
                        <a onclick="$('#createUserModal').modal('show')" class="add" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">

                        <br/>
                        <div class="table-responsive" id="realtime">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Points</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Department </th>
                                        <th>Role </th>
                                        <th>Status </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                @foreach($employee as $item)
                                    @if($data->dep_id==$item->dep_id && $admin_login==null)
                                        @if($item->role!='Manager')
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user_lname }} , {{ $item->user_fname }}</td>
                                            <td>{{ $item->user_points }}</td>
                                            <td>{{ $item->user_email }}</td>
                                            <td>{{ $item->contactnumber }}</td>
                                            <td>{{ $item->dep_id }}</td>    
                                            <td>{{ $item->role }}</td>
                                            <td>{{ $item->status }}</td>
                                            
                                            
                                            <td>
                                                <a href="{{ url('/admin/' . $item->user_id) }}" title="View employee"><button class="btn btn-info btn-sm" id="actbtn"><i class="fa fa-eye" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                                <a href="{{ url('/admin/' . $item->user_id . '/edit') }}" title="Edit employee" id="actbtn"><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                            </td>
                                        </tr>
                                        @endif
                                    @elseif($admin_login!=null)
                                    <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user_lname }} , {{ $item->user_fname }}</td>
                                            <td>{{ $item->user_points }}</td>
                                            <td>{{ $item->user_email }}</td>
                                            <td>{{ $item->contactnumber }}</td>
                                            <td>{{ $item->dep_id }}</td>    
                                            <td>{{ $item->role }}</td>
                                            <td>{{ $item->status }}</td>
                                           
                                            
                                            <td>
                                                <a href="{{ url('/admin/' . $item->user_id) }}" title="View employee"><button class="btn btn-info btn-sm" id="actbtn"><i class="fa fa-eye" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                                <a href="{{ url('/admin/' . $item->user_id . '/edit') }}" title="Edit employee" id="actbtn"><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                            </td>
                                        </tr>
                                   @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="createUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
        <button type="button" class="close" onclick="$('#createUserModal').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="createUserForm">
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
                    @if(($count == 1) and (old('department') <> $item['dep_id']))
                        <option value="{{ $item['dep_id'] }}" selected>{{ $item['dep_name'] }}</option>  
                    @elseif(old('dep_id') === $item['dep_id'])
                        <option value="{{ $item['dep_id'] }}" selected>{{ $item['dep_name'] }}</option>     
                    @else
                        <option value="{{ $item['dep_id'] }}">{{ $item['dep_name']}}</option>
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

        <input type="text" name="admin_id" id="admin_id" class="form-control" value="{{ $admin_id}}"hidden></br>
        
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#createUserModal').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="createUser()">Create</button>
      </div>
    </div>
  </div>
</div>



<script>
    
    function createUser() {
        // Get the form data
        let formData = new FormData(document.getElementById('createUserForm'));

        // Send the form data to the server using Axios
        axios.post('/admin', formData)
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('User created successfully!');
                $('#createUserModal').modal('hide');
                getUser();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error creating the User!');
            });
    }

    function editUser(id) {
        // Get the form data
        let formData = new FormData(document.getElementById('editDepartmentForm'));
        const dep_id=formData.get('dep_id');
        const dep_name=formData.get('dep_name')

        // Send the form data to the server using Axios
        console.log(formData);
        axios.put('/admin/'+id, {
            user_id:user_id,
            dep_name:dep_name
        })
        
            
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('Department edited successfully!');
                $('#editDepartmentModal').modal('hide');
                getUser();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error editing the department!');
            });
    }

    function getUser(){
        axios.get('/admin/getAll')
    .then(response => {
        showUser(response.data);
      
    })
    .catch(error => {
      console.log(error);
    });
    }


    function showUser(admin){
        console.log(admin);
        let variable=document.getElementById('realtime');
        variable.innerHTML='';
        variable.innerHTML+='<table class="table" >'+
        '<thead><tr><th> ID<th>Name<th>Points<th>Email<th>Contanct No.<th>Department<th>Role<th>Status</th></th></th></th></th></th><th>Actions</th></th></th></tr></thead><tbody id="inside">';
        let body=document.getElementById('inside');
        for(i in admin)
        {
            body.innerHTML+='<tr><td>'+admin[i].user_id+'</td><td>'+admin[i].user_lname+', '+admin[i].user_fname+'</td>'+
           '<td>'+admin[i].user_points+'</td>'+'<td>'+admin[i].user_email+'</td>'+'<td>'+admin[i].contactnumber+'</td>'+ 
           '<td>'+admin[i].dep_id+'</td>'+'<td>'+admin[i].role+'</td>'+ '<td>'+admin[i].status+'</td>'+ 
           '<td><a href=""><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>'+
            '<button type="submit" class="btn btn-sm" id="actbtn" title="Delete department" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button></td></tr>';
           
        }
        variable.innerHTML+='</tbody></table>';
        

       
    }
</script>
        
@endsection

