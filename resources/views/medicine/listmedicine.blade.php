@extends('layouts.index')


@section('content')
  <div class="container">
<!--Start Modal Edit A  -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" id="modalContent">
        
      </div>
    </div>
  </div>
<!-- End Modal Edit A -->

<!--Alert  -->
@if (session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>        
@endif
<!-- end alert -->

    <h2 class="text-black">List Medicine</h2>
    <hr>         
    <table class="table table-hover">
      <thead>
        <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Generic Name</th>
        <th>Form</th>
        <th>Restriction Formula</th>
        <th>Description</th>
        <th>Price</th>
        <th>Faskes TK 1</th>
        <th>Faskes TK 2</th>
        <th>Faskes TK 3</th>
        <th colspan="2" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($alldata as $li)
            <tr>
              <td>{{ $li->id}}</td>
              <td><img src="{{asset('medicines_img/'.$li->image)}}" style="width:100px; height:100px;"></td>
              <td>{{ $li->generic_name}}</td>
              <td>{{ $li->form}}</td>
              <td>{{ $li->restriction_formula}}</td>
              <td>{{ $li->description}}</td>
              <td>{{ $li->price}}</td>
              <td>{{ $li->faskes1}}</td>
              <td>{{ $li->faskes2}}</td>
              <td>{{ $li->faskes3}}</td>
              <td>
                  <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm({{$li->id}})">Edit </a>
              </td>
              <td>
                  @can('delete-permission', $li)
                    <form method="POST" action="{{url('medicine/'.$li->id)}}">
                      @csrf
                      @method("DELETE")
                    
                      <input type="submit" value="Delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record')) return false;">
                     
                    </form>
                  @endcan
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>

@endsection

@section('javascript')
<script>
  function getEditForm(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("medicine.getEditForm")}}',
      data:{'_token':'<?php echo csrf_token() ?>',
        'id': id
      },
      success:function(data){
        $('#modalContent').html(data.msg)
      }
    });
  }
</script>
@endsection