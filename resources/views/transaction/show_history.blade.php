@extends('layouts.index')


@section('content')
  <div class="container">
    <h2>History Transaction</h2>
    <hr>         
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID Transaction</th>
          <th>Date</th>
          <th>Total</th>
          <th>Generic Name</th>
          <th>Formula</th>
          <th>Restriction Formula</th>
          <th>Description</th>
          <th>Faskes 1</th>
          <th>Faskes 2</th>
          <th>Faskes 3</th>
          <th>Image Medicine</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $transaction)
              
                  @foreach ($array_detail as $detail)
                  <tr>
                      <td>{{ $transaction->id}}</td>
                      <td>{{ $transaction->transaction_date}}</td>
                      <td>{{ $transaction->total}}</td>
                      <td>{{ $detail->generic_name}}</td>
                      <td>{{ $detail->form}}</td>
                      <td>{{ $detail->restriction_formula}}</td>
                      <td>{{ $detail->description}}</td>
                      <td>{{ $detail->faskes1}}</td>
                      <td>{{ $detail->faskes2}}</td>
                      <td>{{ $detail->faskes3}}</td>
                      <td><img src="{{asset('medicines_img/'.$detail->image)}}" style="width:100px; height:100px;"></td>
                  </tr>
                  @endforeach
          @endforeach
      </tbody>
    </table>
  </div>

@endsection