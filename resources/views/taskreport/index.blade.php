@extends('layouts.layout')
@section('content')
<body>
        <div>
            <h1>Task Report</h1>
            <img src="{{ URL('images/FkK57eeorqM1fBXKH6DRbMnbdsdrQpyPq2r4X0qp.jpg') }}" alt="image" width="400">
            @foreach($taskreport as $item)
            <p>{{$item->report_text}}</p>
            @endforeach
        </div>
    </body>
@endsection