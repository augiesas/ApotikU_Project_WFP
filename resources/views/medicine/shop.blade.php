@extends('layouts.indexshop')

@section('content')


    <div class="site-section">
      <div class="container">
      
        <div class="row">
          @foreach ($alldata as $li)
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop/detail/{{$li->id}}"> <img src="{{asset('medicines_img/'.$li->image)}}" alt="Image" style="width: 200px; height: 200px;"></a>
            <h3 class="text-dark"><a href="shop/detail/{{$li->id}}">{{$li->generic_name}}</a></h3>
            <p class="price">Rp. {{$li->price}}</p>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>

@endsection