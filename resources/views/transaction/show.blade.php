@extends('layouts.index')
@section('content')
<div class="site-section">
<div class="container">
  <h2 class="text-black">Daftar Transaksi</h2>

  @if($array_detail)
    <table class="table table-striped">
    <thead>
      <tr>

        <th class="text-black">Pembeli</th>
        <th class="text-black">Tanggal Transaction</th>
        <th class="text-black">Total</th>
        <th class="text-black">Detail</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($array_detail as $li)
      <tr>
      <td class="text-black">{{$li['name']}}</td>
        <td class="text-black">{{$li['date']}}</td>
        <td class="text-black">{{$li['total']}}</td>
        <td class="text-black">

          @foreach ($li['transaction'] as $lis)
          <p> {{$lis['price']}} * {{$lis['quantity']}}</p>
          @endforeach
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

a