@extends('layouts.index')
@section('content')
    <div class="site-section">
        <div class="container">
            <h2 class="text-black">Daftar Transaksi</h2>

            @if ($array_detail)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-black">Transaction ID</th>
                            <th class="text-black">Pembeli</th>
                            <th class="text-black">Tanggal Transaction</th>
                            <th class="text-black">Total</th>
                            <th class="text-black">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($array_detail as $li)
                            <tr>
                                <td class="text-black">{{ $li['transaction'] }}</td>
                                <td class="text-black">{{ $li['name'] }}</td>
                                <td class="text-black">{{ $li['date'] }}</td>
                                <td class="text-black">{{ $li['total'] }}</td>
                                <td class="text-black">


                                    <a href="#modalDetail" class="btn btn-primary btn-block text-center"
                                        onclick='getDetailForm({{ $li['transaction'] }})' role="button"
                                        data-toggle="modal">Details Transaction</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Show modal --}}
                <div class="modal fade" id="modalDetail" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content" id="modalContent">

                        </div>
                    </div>

                </div>
                <!-- End Modal Edit A -->
        </div>
    @else
        <h2>Tidak ada data</h2>
        @endif
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
