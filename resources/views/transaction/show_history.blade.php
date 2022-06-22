@extends('layouts.index')


@section('content')
<div class="site-section">
    <div class="container">
    <h2 class="text-black">History Transaction</h2>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Transaction</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($array_transaction as $transaction)
                    <tr>
                        <td>{{ $transaction['transaction_id'] }}</td>
                        <td>{{ $transaction['transaction_date'] }}</td>
                        <td>{{ $transaction['total'] }}</td>
                        <td><a href="#modalDetail" class="btn btn-primary btn-block text-center"
                                onclick='getDetailForm({{ $transaction["transaction_id"] }})' role="button"
                                data-toggle="modal">Details Transaction</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        <!--Start Modal Detail A  -->
        <div class="modal fade" id="modalDetail" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="modalContent">

                </div>
            </div>

        </div>
        <!-- End Modal Edit A -->
    </div>
</div>
@endsection

@section('javascript')
    <script>
        function getDetailForm(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('transaction.ShowAjax') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg)
                }
            });
        }
    </script>
@endsection
