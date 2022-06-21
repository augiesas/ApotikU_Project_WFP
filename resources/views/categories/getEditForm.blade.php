<form method="post" form method="post" class="form-horizontal" action="{{url('category/'.$data->id)}}">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Edit Category</h4>
        </div>

        <div class="modal-body">
  		   <!-- FORM CREATE -->
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="control-label col-sm-2" for="name_category">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="eName" placeholder="Enter Name" name="name" value='{{$data->name}}'>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10">          
              <textarea rows="4" cols="64" name="description" id="eDescription" placeholder="Enter Description">{{$data->description}}</textarea>
            </div>
          </div>

       </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>