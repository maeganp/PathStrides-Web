
@extends('layouts.employeelayout')
@section('content')
<div class="row" id="employee-container">
            <div class="col" id="employee-container">
                <div class="card">
                    <div class="card-header">


                        <div class="row" id="card-header">
                            <div class="col">
                                <h2 class="titles">Task Report</h2>
                            </div>
                        </div>

                        <div class="col">
                           
                        </div>
                    </div>
                    <div class="card-body">

                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Task Report ID</th>
                                        <th>Employee Incharge</th>
                                        <th>Task ID</th>
                                        <th>Report Text</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($taskreport as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->task_id }}</td>
                                        <td>{{ $item->report_text }}</td>
                                        
                                        <td>
                                        <a onclick="$('#showAnnouncementModal{{$item->anns_id}}').modal('show')" title="View employee"><button class="btn btn-info btn-sm" id="actbtn"><i class="fa fa-eye" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
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

@foreach($taskreport as $item)
<!-- Modal Show-->
<div class="modal fade" id="showtaskReportModal{{$item->task_report_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showtaskReportModalLabel">Task Report</h5>
        <button type="button" class="close" onclick="$('#showtaskReportModal{{$item->task_report_id}}').modal('hide')"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="card-title">Task Report ID : {{ $item-> task_report_id }}</h5>
        <p class="card-text">Assigned User : {{ $item->user_id }}</p>
        <p class="card-text">Task ID : {{ $item->task_id }}</p>
        <p class="card-text">Report Text : {{ $item->report_text }}</p>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#showtaskReportModal{{$item->task_report_id}}').modal('hide')">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
        
@endsection

