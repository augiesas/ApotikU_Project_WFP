@extends('layouts.index')
@section('content')
<div class="site-section">
<form method="post" class="form-horizontal" action="{{ url('medicine/'.$data->id) }}">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Edit Medicine</h4>
        </div>

        <div class="modal-body">
  		   <!-- FORM CREATE -->
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="control-label col-sm-2" for="generic_name">Generic Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="generic_name" placeholder="Enter Generic Name" name="generic_name" value="{{$data->generic_name}}">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="form">Formula:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="form" placeholder="Enter Formula" name="form" value='{{$data->form}}'>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="restriction_form">Restriction Formula: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="restriction_form" placeholder="Enter Restriction Formula" name="restriction_form" value='{{$data->restriction_formula}}'>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="price">Price: Rp. </label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="price" placeholder="Enter Price (Rp)" name="price" value='{{$data->price}}'>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description: </label>
            <div class="col-sm-10">          
              <textarea rows="4" cols="64" id='description' name="description" placeholder="Enter Description">{{$data->description}}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Category: </label>
            <select id="category" name="category_id">
                <option value="{{$category->id}}" selected hidden>{{$category->name}}</option>
                @foreach ($allcat as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for='faskes1'>Faskes 1: </label>
            <input type="radio" id="faskes1" name="faskes1" value="1" {{$data->faskes1 == 1 ? "checked":""}}>
            <label for="faskes1">Yes</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="faskes1" name="faskes1" value="0" {{$data->faskes1 == 0 ? "checked":""}}>
            <label for="faskes1">No</label>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for='faskes2'>Faskes 2: </label>
            <input type="radio" id="faskes2" name="faskes2" value="1" {{$data->faskes2 == 1 ? "checked":""}}>
            <label for="faskes2">Yes</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="faskes2" name="faskes2" value="0" {{$data->faskes2 == 0 ? "checked":""}}>
            <label for="faskes2">No</label>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for='faskes3'>Faskes 3: </label>
            <input type="radio" id="faskes3" name="faskes3" value="1" {{$data->faskes3 == 1 ? "checked":""}}>
            <label for="faskes3">Yes</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="faskes3" name="faskes3" value="0" {{$data->faskes3 == 0 ? "checked":""}}>
            <label for="faskes3">No</label>
          </div>

       </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
</div>
      @endsection