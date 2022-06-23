@extends('layouts.index')
@section('content')
    <div class="site-section">
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

            <h2>List Categories
                <a href='#modalCreate' data-toggle='modal' class='btn btn-info' style="float:right">
                    + New Category
                </a>
            </h2>

            <!-- modal create new category -->
            <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <form method="post" class="form-horizontal" action="{{ route('category.store') }}">
                            <div class="modal-header">
                                <h4 class="modal-title">Add New Category</h4>
                            </div>

                            <div class="modal-body">
                                <!-- FORM CREATE -->
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name_category">Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                            name="name">
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
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" id='modalContent'>
                    </div>
                </div>
            </div>

            @if ($alldata)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $li)
                            <tr id='tr_{{ $li->id }}'>
                                <td>{{ $li->id }}</td>
                                <td class="editable" id='td_name_{{ $li->id }}'>{{ $li->name }}</td>
                                <td class="editable" id='td_description_{{ $li->id }}'>{{ $li->description }}</td>

                                <td>
                                    <a href='#modalEdit' data-toggle='modal' class="btn btn-xs btn-warning"
                                        onclick='getEditForm({{ $li->id }})'>edit</a>
                                    <input class='btn btn-xs btn-danger' type="submit" value="Delete"
                                        onclick='if(confirm("Are your sure?")) deleteDataRemoveTR({{ $li->id }})'></input>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h2>Tidak ada data</h2>
            @endif
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('category.getEditForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }

        function deleteDataRemoveTR(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('category.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    if (data.status == 'ok') {
                        $('#modalContent').html(data.msg)
                        // location.reload();
                        console.log($('#tr_' + id));
                        $('#tr_' + id).remove();
                    }
                }
            });
        }
    </script>
@endsection
