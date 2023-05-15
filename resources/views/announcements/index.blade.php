@extends('layouts.employeelayout')
@section('content')

<div class="row">
    <div class="col" id="employee-container">
        <div class="card">
            <div class="row" id="card-header">
                <div class="col">
                    <h2 class="titles">Announcements</h2>
                </div>
                <div class="col">
                    <a onclick="$('#createAnnouncementModal').modal('show')" class="add" title="Add New announcement">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <br/>
                @include('announcements.announcement_table')
            </div>
        </div>
                    
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="createAnnouncementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAnnouncementModalLabel">Create Announcement</h5>
        <button type="button" class="close" onclick="$('#createAnnouncementModal').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="createAnnouncementForm">
        <div class="form-group">
                <label for="title">Announcement Title</label>
                <input type="text" class="form-control" id="anns_title" name="anns_title">
            </div>
            <div class="form-group">
                <label for="body">Announcement Description</label>
                <textarea class="form-control" id="anns_desc" name="anns_desc"></textarea>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#createAnnouncementModal').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="createAnnouncement()">Create</button>
      </div>
    </div>
  </div>
</div>


@foreach($announcements as $item)
<!-- Modal Edit-->
<div class="modal fade" id="editannouncementModal{{$item->anns_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editannouncementModalLabel">Edit announcement</h5>
        <button type="button" class="close" onclick="$('#editannouncementModal{{$item->anns_id}}').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <form id="editannouncementForm">

            <div class="form-group">
             @method('PUT')
                <input type="text" name="anns_id" id="anns_id" value="{{$item->anns_id}}"hidden >
                <label for="dep_name">announcement Name</label>
                <input type="text" class="form-control" id="dep_name" name="dep_name" value="{{$item->dep_name}}" required >
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#editannouncementModal{{$item->anns_id}}').modal('hide')">Close</button>
        <button type="button" class="btn btn-primary" onclick="editannouncement({{$item->anns_id}})">Edit</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($announcements as $item)
<!-- Modal Show-->
<div class="modal fade" id="showAnnouncementModal{{$item->anns_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showAnnouncementModalLabel">Announcement</h5>
        <button type="button" class="close" onclick="$('#showAnnouncementModal{{$item->anns_id}}').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="card-title">Announcement ID : {{ $item-> anns_id }}</h5>
        <p class="card-text">Announcment Title : {{ $item->anns_title }}</p>
        <p class="card-text">Announcment Title : {{ $item->anns_desc }}</p>
        <img src="{{asset('storage/images/16663237389b12b246be36bb793ec730a57fa9cf0f.jpg')}}" width="100px" height="100px" alt="">

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#showAnnouncementModal{{$item->anns_id}}').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
    
    function createAnnouncement() {
        // Get the form data
        let formData = new FormData(document.getElementById('createAnnouncementForm'));

        // Send the form data to the server using Axios
        axios.post('/announcement', formData)
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('announcement created successfully!');
                $('#createAnnouncementModal').modal('hide');
                getAnnouncement();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error creating the announcement!');
            });
    }

    function editAnnouncement(id) {
        // Get the form data
        let formData = new FormData(document.getElementById('editAnnouncementForm'));
        const anns_id=formData.get('anns_id');
        const dep_name=formData.get('dep_name')

        // Send the form data to the server using Axios
        console.log(formData);
        axios.put('/announcement/'+id, {
            anns_id:anns_id,
            dep_name:dep_name
        })
        
            
            .then(response => {
                // Handle the successful response
                console.log(response.data);
                alert('announcement edited successfully!');
                $('#editAnnouncementModal').modal('hide');
                getannouncement();
            })
            .catch(error => {
                // Handle the error response
                console.log(error);
                alert('There was an error editing the announcement!');
            });
    }

    function getAnnouncement(){
        axios.get('/announcement/getAll')
    .then(response => {
      showAnnouncements(response.data);
      
    })
    .catch(error => {
      console.log(error);
    });
    }


    function showAnnouncements(announcement){
        console.log(announcement);
        let variable=document.getElementById('table-responsive');
        variable.innerHTML='';
        variable.innerHTML+='<table class="table" >'+
        '<thead><tr><th>Announcement ID<th>Announcement Name<th>Announcement Description</th><th>Actions</th></th></th></tr></thead><tbody id="inside">';
        let body=document.getElementById('inside');
        for(i in announcement)
        {
            body.innerHTML+='<tr><td>'+announcement[i].anns_id+'</td><td>'+announcement[i].anns_title+'</td>'+
            '<td>'+announcement[i].anns_desc+'</td>'+
            '<td><a href=""><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>'+
            '<button type="submit" class="btn btn-sm" id="actbtn" title="Delete announcement" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button></td></tr>';
           
        }
        variable.innerHTML+='</tbody></table>';
        

       
    }
</script>

@endsection