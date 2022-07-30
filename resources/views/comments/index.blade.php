@extends('comments.layout')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Reviews</h2>
                </div>
                <div class="card-body">
                    @if (Auth::user()!=null)
                    <a href="{{ url('/comment/create') }}" class="btn btn-success btn-sm" title="Add New Comment">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    @endif
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date Posted</th>
                                    <th>Comment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->date_posted }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->rating }}</td>

                                    <td>
                                        <a href="{{ url('/comment/' . $item->id) }}" title="View Comment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        @if (Auth::user()!=null)
                                        <a href="{{ url('/comment/' . $item->id . '/edit') }}" title="Edit Comment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        @endif

                                        <form method="POST" action="{{ url('/comment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            @if (Auth::user()!=null)
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Comment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            @endif
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
</div>
@endsection