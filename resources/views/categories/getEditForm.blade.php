<form method="post" form method="post" class="form-horizontal" action="{{ url('category/' . $data->id) }}">
    <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
    </div>

    <div class="modal-body d-flex justify-content-center flex-column">
        <!-- FORM CREATE -->
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="control-label col-sm-2" for="name_category">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="eName" placeholder="Enter Name" name="name"
                    value='{{ $data->name }}' required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10">
                <textarea rows="2" cols="30" name="description" id="eDescription" placeholder="Enter Description"
                    style="width: 100%;">{{ $data->description }}</textarea>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
</form>
