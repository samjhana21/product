@extends('viewplaces.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit</div>
  <div class="card-body">
      
      <form action="{{ url('viewplaces/'.$viewplaces->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$viewplaces->id}}" id="id" />
       
        <label>PlaceName</label>
      </br>
       <input type="text" name="placename" id="placename" value="{{$viewplaces->placename}}" class="form-control">
      </br>

        <label>Image</label>
      </br>
        <input type="file" name="image" id="image" class="form-control">
        <img src="{{ asset('uploads/viewplaces/'.$viewplaces->image) }}" width="70px" height="70px" alt="Image">
      </br>
       
        <label>Description</label>
      </br>
        <input type="text" name="description" id="description" value="{{$viewplaces->description}}" class="form-control">
      </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop


