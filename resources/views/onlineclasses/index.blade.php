@extends('onlineclasses.layout')
@section('content')
<div class="container">
    <div class="row">
        
<table>
    <thead style="background: #D7C3A3">
        <tr>
            <th>Class Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>Duration</th>
            <th><a href="{{ url('/onlineclasses/create') }}"><button class="btn btn-danger">Add New</button> 
            </a></th>
        </tr>
    </thead>
    <tbody>
@foreach ($classes as $item)
        <tr>
            <td>{{$item->class_name}}</td>
            <td>{{$item->class_date}}</td>
            <td>{{$item->start_time}}</td>
            <td>{{$item->duration}}</td>
            <td><a href="{{ url('/onlineclasses/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                <a href="{{ url('/onlineclasses/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                <form method="POST" action="{{ url('/onlineclasses' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form></td>
        </tr>

@endforeach
    </tbody>
</table>
    </div>
</div>
<br><br>
<div style="margin-left: 40%"><div style="width: 45%">{{$classes->links()}}</div></div>

@endsection