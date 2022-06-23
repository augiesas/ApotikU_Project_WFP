@extends('layouts.index')

@section('content')
    <div class="container">
    <h3 class="text-black">Top 3 Customer</h3>
    <hr> 
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="h4 text-black">Id</th>
            <th class="h4 text-black">Email</th>
            <th class="h4 text-black">Name</th>
            <th class="h4 text-black">Total</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $list)
          <tr>
                <td><h2 class="h5 text-black">{{ $list->id}}</h2></td>
                <td><h2 class="h5 text-black">{{ $list->email}}</h2></td>
                <td><h2 class="h5 text-black">{{ $list->name}}</h2></td>
                <td><h2 class="h5 text-black">Rp. {{ $list->total}}</h2></td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    </div>
@endsection