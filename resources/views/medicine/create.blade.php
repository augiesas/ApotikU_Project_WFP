@extends('layouts.index')
@section('content')
<div class="site-section">
<div class="container">
  <h2>Create New Medicine</h2>
  <form method="post" class="form-horizontal" action="{{route('medicine.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2">Logo</label>
      <div class="col-sm-10">
        <input type="file" name="logo" id="logo" class="form-control">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="generic_name">Generic Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="generic_name" placeholder="Enter Generic Name" name="generic_name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="form">Formula:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="form" placeholder="Enter Formula" name="form">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="restriction_form">Restriction Formula: </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="restriction_form" placeholder="Enter Restriction Formula" name="restriction_form">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price: Rp. </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="price" placeholder="Enter Price (Rp)" name="price">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description: </label>
      <div class="col-sm-10">          
        <textarea rows="4" cols="122" name="description" placeholder="Enter Description"></textarea>
      </div>
    </div>

    <div class="form-group">
      @if($category)

        <label class="control-label col-sm-2" for="description">Category: </label>
        <select id="category" name="category_id">
          @foreach ($category as $c)
          <option value="{{$c->id}}">{{$c->name}}</option>
          @endforeach
        </select>

      @endif
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for='faskes1'>Faskes 1: </label>
      <input type="radio" id="faskes1" name="faskes1" value="1">
      <label for="faskes1">Yes</label>&nbsp;&nbsp;&nbsp;
      <input type="radio" id="faskes_1_no" name="faskes1" value="0">
      <label for="faskes1">No</label>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for='faskes2'>Faskes 2: </label>
      <input type="radio" id="faskes2" name="faskes2" value="1">
      <label for="faskes2">Yes</label>&nbsp;&nbsp;&nbsp;
      <input type="radio" id="faskes2" name="faskes2" value="0">
      <label for="faskes2">No</label>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for='faskes3'>Faskes 3: </label>
      <input type="radio" id="faskes3" name="faskes3" value="1">
      <label for="faskes3">Yes</label>&nbsp;&nbsp;&nbsp;
      <input type="radio" id="faskes3" name="faskes3" value="0">
      <label for="faskes3">No</label>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Create</button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection