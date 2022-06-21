@extends('layouts.index')


@section('content')


    <div class="site-section">
      <div class="container">
      
        <div class="row">
          @foreach ($alldata as $li)
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="{{url('/detail/'.$li->id)}}"> <img src="{{asset('medicines_img/'.$li->image)}}" alt="Image" style="width: 200px; height: 200px;"></a>
            <h3 class="text-dark"><a href="{{url('/detail/'.$li->id)}}">{{$li->generic_name}}</a></h3>
            <p class="price">Rp. {{$li->price}}</p>
            @if (Auth::check() )

                
            <p class="btn-holder"><a href="{{url('add-to-cart/'.$li->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
          @endif
          </div>
          @endforeach
          
        </div>
      </div>
    </div>

@endsection