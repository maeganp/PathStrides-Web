

@extends('layouts.employeelayout')
@section('content')
<div class="row" id="employee-container">
    <div class="col" id="employee-container">
        <div class="card">
            <div class="card-header">
                <div class="row" id="card-header">
                    <div class="col">
                        <h2 class="titles">Point Shop</h2>
                    </div>
                </div>
                <div class="col">
                <a onclick="$('#creatPointShopModal').modal('show')" class="add" title="Add New Contact">
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
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Price</th> 
                                <th>Item Code</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->points }}</td>
                                    <td>{{ $item->item_code }}</td>
                                    
                                    <td>
                                        
                                    <a href="{{ url('/department/' . $item->dep_id . '/edit') }}" title="Edit department" id="actbtn"><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
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
<div class="modal fade" id="creatPointShopModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="creatPointShopModalLabel">Create Pointshop</h5>
        <button type="button" class="close" onclick="$('#creatPointShopModal').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="createPointshopForm">
        <div class="form-group">
                <label for="item_name">Item name</label>
                <input type="text" class="form-control" id="item_name" name="item_name">
            </div>
            <div class="form-group">
                <label for="points">points</label>
                <input type="text" class="form-control"  id="points" name="points"></textarea>
            </div>
            <div class="form-group">
                <label for="item_code">Item Code</label>
                <input type="text" class="form-control" id="item_code" name="item_code">
            </div>
            <input type="text" name="user_id" id="user_id" class="form-control" value="{{$admin_login}}"hidden></br>
            
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#creatPointShopModal').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="createPointshop()">Create</button>
      </div>
    </div>
  </div>
</div>


@foreach($product as $item)
<!-- Modal Edit-->
<div class="modal fade" id="editPointshopModal{{$item->anns_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPointshopModalLabel">Edit Pointshop</h5>
        <button type="button" class="close" onclick="$('#editPointshopModal{{$item->anns_id}}').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="editPointshopForm">

            <div class="form-group">
             @method('PUT')
                <input type="text" name="anns_id" id="anns_id" value="{{$item->anns_id}}"hidden >
                <label for="dep_name">Pointshop Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" value="{{$item->dep_name}}" required >
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#editPointshopModal{{$item->anns_id}}').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="editPointshop({{$item->anns_id}})">Edit</button>
      </div>
    </div>
  </div>
</div>
@endforeach



<script>
    
    function createPointshop() {
        // Get the form data
        let formData = new FormData(document.getElementById('createPointshopForm'));

        // Send the form data to the server using Axios
        axios.post('/pointshop', formData)
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('Pointshop created successfully!');
                $('#creatPointShopModal').modal('hide');
                getPointshop();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error creating the Pointshop!');
            });
    }

    function editPointshop(id) {
        // Get the form data
        let formData = new FormData(document.getElementById('editPointshopForm'));
        const anns_id=formData.get('anns_id');
        const dep_name=formData.get('dep_name')

        // Send the form data to the server using Axios
        console.log(formData);
        axios.put('/pointshop/'+id, {
            anns_id:anns_id,
            dep_name:dep_name
        })
        
            
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('Pointshop edited successfully!');
                $('#editPointshopModal').modal('hide');
                getPointshop();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error editing the Pointshop!');
            });
    }

    function getPointshop(){
        axios.get('/pointshop/getAll')
    .then(response => {
      showPointshops(response.data);
      
    })
    .catch(error => {
      console.log(error);
    });
    }


    function showPointshops(item){
        console.log(item);
        let variable=document.getElementById('realtime');
        variable.innerHTML='';
        variable.innerHTML+='<table class="table" >'+
        '<thead><tr><th>Item ID<th>Item Name<th>Points<th>Item Code</th></th><th>Actions</th></th></th></tr></thead><tbody id="inside">';
        let body=document.getElementById('inside');
        for(i in item)
        {
            body.innerHTML+='<tr><td>'+item[i].item_id+'</td><td>'+item[i].item_name+'</td>'+
            '<td>'+item[i].points+'</td>'+'<td>'+item[i].item_code+'</td>'+
            '<td><a href=""><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>'+
            '<button type="submit" class="btn btn-sm" id="actbtn" title="Delete item" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button></td></tr>';
           
        }
        variable.innerHTML+='</tbody></table>';
        

       
    }
</script>


        
@endsection

<!-- rawr -->