@extends('viewplaces.layout')
@section('content')
<div class="card">
  <div class="card-header">Create</div>
  <div class="card-body">
      
      <form action="{{ route('viewplaces.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
     
        <label>PlaceName</label></br>
        <input type="text" name="placename" id="placename" class="form-control"></br>

        <label>Image</label></br>
        <input type="file" name="image" id="image" class="form-control"></br>
       
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div> 
</div>
@stop

