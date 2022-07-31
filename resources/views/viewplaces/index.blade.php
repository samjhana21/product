@extends('viewplaces.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">View places</div>
                    <div class="card-body">
                        <a href="{{ route('viewplaces.create') }}" class="btn btn-success btn-sm" title="Add New viewplaces">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PlaceName</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($viewplaces as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->placename }}</td>
                                        <td> 
                                            <img src="{{ asset('uploads/viewplaces/'.$item->image) }}" width="70px" height="70px" alt="Image">
                                        </td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('/viewplaces' . '/'. $item->id) }}" title="View"><button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                            
                                            <a href="{{ url('/viewplaces' . '/'. $item->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                            
                                                <form method="POST" action="{{ url('/viewplaces' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
