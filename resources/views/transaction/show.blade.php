@extends('layouts.conquer')
@section('content')
<div class="site-section">
<div class="container">
  <h2>Daftar Transaksi</h2>

  @if($allData)
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pembeli</th>
        <th>Kasir</th>
        <th>Tanggal Transaction</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($allData as $li)
      <tr>
        <td>{{ $li->id }}</td>
        <td>{{ $li->buyer->name }}</td>
        <td>{{ $li->user->name }}</td>
        <td>{{ $li->created_at }}</td>
        <td>
          <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{$li->id}});">Lihat Rincian Pembelian</a>

          <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detail Transaksi</h4>
                  </div>
                  <div class="modal-body">
                    <div id='msg'></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
            </div>
          </div>
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
    function getDetailData(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("transaction.showAjax")}}',
            data: '_token= <?php echo csrf_token() ?>&id=' + id,
            success: function(data) {
                $('#msg').html(data.msg)
            }
        });
    }
</script>

</div>
@endsection