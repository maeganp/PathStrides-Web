<!-- 
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>List of Departments</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/department/create') }}" class="btn btn-success btn-sm" title="Add New department">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Department ID</th>
                                        <th>Department Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->dep_name }} </td>
                                        
                            
                                        <td>
                                           
                                            <a href="{{ url('/department/' . $item->dep_id . '/edit') }}" title="Edit department"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/department' . '/' . $item->dep_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete department" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="dashboard">Home</a>
                            <a href="loginAdmin">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 -->

@extends('layouts.employeelayout')
@section('content')
<div class="row" id="employee-container">
    <div class="col" id="employee-container">
        <div class="card">
            <div class="card-header">
                <div class="row" id="card-header">
                    <div class="col">
                        <h2 class="titles">Departments</h2>
                    </div>
                </div>
                <div class="col">
                    <a onclick="$('#createDepartmentModal').modal('show')" class="add" title="Add New department">
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
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $item)
            
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->dep_name }} </td>
                                
                            
                                    <td>
                                        
                                    <a onclick="$('#editDepartmentModal{{$item->dep_id}}').modal('show')" title="Edit department" id="actbtn"><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                        <form method="POST" action="{{ url('/department' . '/' . $item->dep_id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm" id="actbtn" title="Delete department" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button>
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
<div class="modal fade" id="createDepartmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDepartmentModalLabel">Create Department</h5>
        <button type="button" class="close" onclick="$('#createDepartmentModal').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="createDepartmentForm">
            <div class="form-group">
                <label for="dep_name">Department Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" required>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#createDepartmentModal').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="createDepartment()">Create</button>
      </div>
    </div>
  </div>
</div>


@foreach($departments as $item)
<!-- Modal Edit-->
<div class="modal fade" id="editDepartmentModal{{$item->dep_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDepartmentModalLabel">Edit Department</h5>
        <button type="button" class="close" onclick="$('#editDepartmentModal{{$item->dep_id}}').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="editDepartmentForm">

            <div class="form-group">
            @method("PATCH")
                <input type="text" name="dep_id" id="dep_id" value="{{$item->dep_id}}"hidden >
                <label for="dep_name">Department Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" value="{{$item->dep_name}}" required >
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#editDepartmentModal{{$item->dep_id}}').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="editDepartment({{$item->dep_id}})">Edit</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
    
    function createDepartment() {
        // Get the form data
        let formData = new FormData(document.getElementById('createDepartmentForm'));

        // Send the form data to the server using Axios
        axios.post('/department', formData)
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('Department created successfully!');
                $('#createDepartmentModal').modal('hide');
                getDepartment();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error creating the department!');
            });
    }

    function editDepartment(id) {
        // Get the form data
        let formData = new FormData(document.getElementById('editDepartmentForm'));
        const dep_id=formData.get('dep_id');
        const dep_name=formData.get('dep_name')

        // Send the form data to the server using Axios
        console.log(formData);
        axios.put('/department/'+id, {
            dep_id:dep_id,
            dep_name:dep_name
        })
        
            
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('Department edited successfully!');
                $('#editDepartmentModal').modal('hide');
                getDepartment();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error editing the department!');
            });
    }

    function getDepartment(){
        axios.get('/department/getAll')
    .then(response => {
      showDepartments(response.data);
      
    })
    .catch(error => {
      console.log(error);
    });
    }


    function showDepartments(department){
        console.log(department);
        let variable=document.getElementById('realtime');
        variable.innerHTML='';
        variable.innerHTML+='<table class="table" >'+
        '<thead><tr><th>Department ID<th>Department Name<th>Actions</th></th></th></tr></thead><tbody id="inside">';
        let body=document.getElementById('inside');
        for(i in department)
        {
            body.innerHTML+='<tr><td>'+department[i].dep_id+'</td><td>'+department[i].dep_name+'</td>'+
            '<td><a href=""><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>'+
            '<button type="submit" class="btn btn-sm" id="actbtn" title="Delete department" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button></td></tr>';
           
        }
        variable.innerHTML+='</tbody></table>';
        

       
    }
</script>
        
@endsection