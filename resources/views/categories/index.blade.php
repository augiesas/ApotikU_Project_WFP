@extends('layouts.conquer')
@section('content')
<div class="container">
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  <div class="note note-success" id='pesan' style='display:none'>
    
  </div>

  <h2>List Categories</h2>
  <a href='#modalCreate' data-toggle='modal' class='btn btn-info'>
    + New Category
  </a>

  <!-- modal create new category -->
  <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
      <form method="post" class="form-horizontal" action="{{route('category.store')}}">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Category</h4>
        </div>

        <div class="modal-body">
  		   <!-- FORM CREATE -->
          @csrf
          <div class="form-group">
            <label class="control-label col-sm-2" for="name_category">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name_category" placeholder="Enter Name" name="name_category">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10">          
              <textarea rows="4" cols="64" name="description" placeholder="Enter Description"></textarea>
            </div>
          </div>

       </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Create</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- modal edit type A -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id='modalContent'>
        <!-- <div style='text-align:center'> -->
          <!-- <img src='{{asset("conquer2/img/loading.gif")}}'/>
        </div> -->
      </div>
    </div>
  </div>

  @if($alldata)
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Logo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($alldata as $li)
      <tr id='tr_{{$li->id}}'>
        <td>{{ $li->id }}</td>
        <td class="editable" id='td_name_{{$li->id}}'>{{ $li->name }}</td>
        <td class="editable" id='td_description_{{$li->id}}'>{{ $li->description }}</td>
        <td>
          <img height='50px' src='{{ asset("/images/".$li->logo) }}'></img>
        
          <!-- modal create edit logo -->
          <div class="modal fade" id="modalChange_{{ $li->id }}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" >
              <form method="post" class="form-horizontal" action="{{route('category.changeLogo')}}" enctype='multipart/form-data'>
                <div class="modal-header">
                  <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Change Logo</h4>
                </div>

                <div class="modal-body">
                <!-- FORM CREATE -->
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="logo">Logo</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="logo"name="logo">
                      <input type='hidden' id='id' name='id' value='{{ $li->id }}'></input>
                    </div>
                  </div>

              </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </form>
              </div>
            </div>
          </div>

          <br>
          <a href='#modalChange_{{ $li->id }}' data-toggle='modal' class='btn btn-xs btn-default'>Change</a>
        
        </td>

        <td>
          <a href="{{ route('category.edit',$li->id) }}" class="btn btn-xs btn-info">edit</a>

          <a href='#modalEdit' data-toggle='modal' 
          class="btn btn-xs btn-warning" onclick='getEditForm({{$li->id}})'>edit A</a>
        
          <a href='#modalEdit' data-toggle='modal' 
          class="btn btn-xs btn-warning" onclick='getEditForm2({{$li->id}})'>edit B</a>
        </td>
        <td>
          @can('delete-permission',$li)
          <form method="post" action="{{ url('category/'.$li->id) }}">
              @csrf
              @method('DELETE')
              <input type="submit" value="delete" class="btn btn-danger btn-xs" onclick="if(!confirm('Are you sure to delte this record ?')) return false;">
          </form>
          @endcan

          <a class='btn btn-xs btn-danger' 
          onclick='if(confirm("Are your sure?")) deleteDataRemoveTR({{$li->id}})'>delete 2</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  @else
    <h2>Tidak ada data</h2>
  @endif
</div>

@endsection

@section('javascript')
<script>
    function getEditForm(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("category.getEditForm")}}',
            data: {'_token':'<?php echo csrf_token() ?>',
                  'id':id
            },
            success: function(data) {
                $('#modalContent').html(data.msg)
            }
        });
    }

    function getEditForm2(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("category.getEditForm2")}}',
            data: {'_token':'<?php echo csrf_token() ?>',
                  'id':id
            },
            success: function(data) {
                $('#modalContent').html(data.msg)
            }
        });
    }

    function saveDataUpdateTD(id) {
      var eName = $('#eName').val();
      var eDescription = $('#eDescription').val();
        $.ajax({
            type: 'POST',
            url: '{{route("category.saveData")}}',
            data: {'_token':'<?php echo csrf_token() ?>',
                  'id':id,
                  'name':eName,
                  'description':eDescription
            },
            success: function(data) {
                if(data.status == "oke"){
                  $('#td_name_' + id).html(eName);
                  $('#td_description_' + id).html(eDescription);
                  
                  $('#pesan').show();
                  $('#pesan').html(data.msg);
                }
            }
        });
    }

    function deleteDataRemoveTR(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("category.deleteData")}}',
            data: {'_token':'<?php echo csrf_token() ?>',
                  'id':id
            },
            success: function(data) {
                if(data.status == "oke"){
                  alert(data.msg);
                  $("#tr_" + id).remove();
                } else {
                  alert(data.msg);
                }
            }
        });
    }
</script>
@endsection

@section('initialscript')
<script>
  $('.editable').editable({
    closeOnEnter :true,
    callback:function(data){
      if(data.content){
        var s_id = data.$el[0].id
        var fname = s_id.split('_')[1]
        var id = s_id.split('_')[2]

        $.ajax({
            type:'POST',
            url:'{{route("category.saveDataField")}}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'id':id,
                'fname':fname,
                'value':data.content
            },
            success: function(data){
              alert(data.msg)
            }
        });
      }
    }
  });
</script>
@endsection