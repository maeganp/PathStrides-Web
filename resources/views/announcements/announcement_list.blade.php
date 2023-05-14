<div class="anncon">
@foreach($announcements as $item)
   <!-- <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->ann_title }} </td>
        <td>{{ $item->location }} </td>
        <td>{{ $item->anns_lat }} , {{ $item->anns_long }} </td>
        <td>{{ $item->man_id }}</td>
    </tr> -->
    <a class="ann-link" onclick="$('#showAnnouncementModal{{$item->anns_id}}').modal('show')">
    <div class="ann-task-list-con">
        <h4 class="ann-task-list-title">{{ $item->anns_title }}</h4>
        <p class="ann-task-desc">{{ $item->anns_desc }}</p>
    </div>
    </a>
@endforeach
</div>

@foreach($announcements as $item)
<!-- Modal Show-->
<div class="modal fade" id="showAnnouncementModal{{$item->anns_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" >
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

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#showAnnouncementModal{{$item->anns_id}}').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach



<style>

    .anncon{
        overflow-y: auto;
        height: 67vh;
        max-height: 30vh;
        padding: none;
    }

    .ann-link{
        text-decoration: none;
        color: black;
        padding: 0;
    }

    .ann-link:hover{
        color: white;
        text-decoration: none;
    }

    .ann-link:visited{
        color: white;
        text-decoration: none;
    }

    .ann-task-list-con{
        background-color: white;
        border-radius: 5px;
        padding: 1em;
        margin-bottom: 0.5em;
        color: black;
        max-width: 29em;
    }

    .ann-task-list-con:hover{
        decoration: none;
        background-color: #FF7843;
        color: white;
    }

    .ann-task-desc{
        margin-bottom: 0;
        font-size: 11px;
    }

    .ann-task-list-title{
        font-size: 14px;
        font-weight: bold;
    }



</style>