@extends('layouts.frontend')


@section('content')

    <div class="container products">
        <div class="row">
            @foreach($medicines as $medicine)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/'.$medicine->id.'.jpg') }}" width="500" height="300">
                    <div class="caption">
                        <h4>{{ $medicine->generic_name }}</h4>
                        <p>{{ Str::limit(strtolower($medicine->description),50) }}</p>
                        <p><strong>Price: </strong>Rp. {{ $medicine->price }}</p>
                        <p class="btn-holder"><a href="{{url('add-to-cart/'.$medicine->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection