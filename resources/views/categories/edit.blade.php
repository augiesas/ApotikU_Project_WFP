@extends('layouts.index')
@section('content')
<div class="site-section">
<div class="container">
  <h2>Edit Category</h2>
  <form method="post" class="form-horizontal" action="{{ url('category/'.$data->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label class="control-label col-sm-2" for="name_category">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name_category" placeholder="Enter Name" name="name" value="{{$data->name}}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-10">          
        <textarea rows="4" cols="122" name="description" placeholder="Enter Description">{{$data->description}}</textarea>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection