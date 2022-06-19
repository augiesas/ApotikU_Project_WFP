@extends('layouts.conquer')
@section('content')
<div class="site-section">
<div class="portlet">
    <div class="portlet-title" style='background:#D8D8D8; font-size:15px;'>
        <b>Tampilan Transaksi dari: {{$data->id}} - {{$data->transaction_date}}</b>
    </div>
    <br>
    <div class="portlet-body">
        <div class="row">
            @foreach($medicines as $dp)
                <div class="col-md-4">
                  <div class="thumbnail">
                    <img src="{{ asset('images/'.$dp->id.'.jpg') }}" width='150px' height='150px'>
                    <div class="caption">
                      <p align="center" style='border:1px solid black; background:#00CED1;'><b>{{$dp->generic_name}}</b></p>
                      <hr/>
                      <p>Kategori: {{$dp->category->name}}</p>
                      <p>Harga: Rp. {{$dp->price}}</p>
                      <p>Jumlah Beli: {{$dp->pivot->quantity}}</p>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection