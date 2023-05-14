
                        <div class="table-responsive" id="table-responsive">
                        <div style="overflow-y: auto; overflow-x:hidden;">
                            <table class="table" id="tables">
                                <thead>
                                    <tr>
                                        <th>Announcement ID</th>
                                        <th>Announcement Title</th>
                                        <th>Announcement Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($announcements as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->anns_title }} </td>
                                        <td>{{ $item->anns_desc }} </td>
                                        <td>
                                        <a onclick="$('#showAnnouncementModal{{$item->anns_id}}').modal('show')" title="View announcement"><button class="btn btn-info btn-sm" id="actbtn"><i class="fa fa-eye" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                            <a href="{{ url('/announcement/' . $item->anns_id . '/edit') }}" title="Edit announcement"><button class="btn btn-primary btn-sm"  id="actbtn"><i class="fa fa-pencil-square-o" aria-hidden="true" id="vieweditbtnicon"></i></button></a>
                                            <form method="POST" action="{{ url('/announcement' . '/' . $item->anns_id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm" id="actbtn" title="Delete Announcement" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-minus-square" aria-hidden="true" id="vieweditbtnicon"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>