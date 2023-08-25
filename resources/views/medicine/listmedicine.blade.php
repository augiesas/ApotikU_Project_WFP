@extends('layouts.index')


@section('content')
<div class="container">
    <!--Start Modal Edit A  -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content" id="modalContent">

            </div>
            <div class="modal-content" id="modalContent-error">

            </div>
        </div>
    </div>
    <!-- End Modal Edit A -->

    <!--Start modal Create  -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true" style="padding-top: 5rem;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('medicine.store') }}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Medicine</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Image </label>
                            <div class="col-sm-10">
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="generic_name">Generic Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="generic_name" placeholder="Enter Generic Name" name="generic_name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="form">Formula:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="form" placeholder="Enter Formula" name="form" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="restriction_form">Restriction Formula: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="restriction_form" placeholder="Enter Restriction Formula" name="restriction_form" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="price">Price: Rp. </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" placeholder="Enter Price (Rp)" name="price" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="description">Description: </label>
                            <div class="col-sm-10">
                                <textarea rows="4" cols="65" name="description" placeholder="Enter Description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            @if ($category)
                            <label class="control-label" for="description">Category: </label>
                            <select id="category" name="category_id" required>
                                @foreach ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label" for='faskes1'>Faskes 1: </label>
                            <input type="radio" id="faskes1" name="faskes1" value="1">
                            <label for="faskes1">Yes</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="faskes_1_no" name="faskes1" value="0" checked>
                            <label for="faskes1">No</label>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for='faskes2'>Faskes 2: </label>
                            <input type="radio" id="faskes2" name="faskes2" value="1">
                            <label for="faskes2">Yes</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="faskes2" name="faskes2" value="0" checked>
                            <label for="faskes2">No</label>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for='faskes3'>Faskes 3: </label>
                            <input type="radio" id="faskes3" name="faskes3" value="1">
                            <label for="faskes3">Yes</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="faskes3" name="faskes3" value="0" checked>
                            <label for="faskes3">No</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Create -->
    <!--Alert  -->
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>

    @elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <!-- end alert -->

    <h2>List Medicines
        <a href='#modalCreate' data-toggle='modal' class='btn btn-info' style="float:right">
            + New Medicine
        </a>
    </h2>
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
                <th>Category Name</th>
                <th colspan="2" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alldata as $key=>$li)
            <tr>
                <td>{{ $li->id }}</td>
                <td><img src="{{ asset('medicines_img/' . $li->image) }}" style="width:100px; height:100px;">
                </td>
                <td>{{ $li->generic_name }}</td>
                <td>{{ $li->form }}</td>
                <td>{{ $li->restriction_formula }}</td>
                <td>{{ $li->description }}</td>
                <td>{{ $li->price }}</td>
                <td>{{ $li->faskes1 }}</td>
                <td>{{ $li->faskes2 }}</td>
                <td>{{ $li->faskes3 }}</td>

                <td>{{ $med_cat[$key]->name }}</td>


                <td>
                    <a href="#modalEdit" data-toggle="modal" class="btn btn-warning btn-xs" onclick="getEditForm({{ $li->id }})">Edit </a>
                </td>
                <td>
                    @can('delete-permission', $li)
                    <form method="POST" action="{{ url('medicine/' . $li->id) }}">
                        @csrf
                        @method('DELETE')

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
    function getEditForm(id) {
        $.ajax({
            type: 'POST',
            url: "{{ route('medicine.getEditForm') }}",
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id
            },
            success: function(data) {
                // if(data.=='ok'){
                $('#modalContent').html(data.msg)
                // }
            }
        });
    }
</script>
@endsection