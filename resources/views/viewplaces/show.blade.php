@extends('viewplaces.layout')
@section('content')
<div class="card">
  <div class="card-header">View</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">PlaceName: {{ $viewplaces->placename }}</h5>
        <p class="file">Image :<img src="{{ asset('uploads/viewplaces/'.$viewplaces->image) }}" width="70px" height="70px" alt="Image">
</p>
        <p class="card-text">Description : {{ $viewplaces->description }} </p>
  </div>
      
    </hr>
  
  </div>
</div>