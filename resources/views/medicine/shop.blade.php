@extends('layouts.indexshop')

@section('navbar')
<div class="main-nav d-none d-lg-block">
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <ul class="site-menu js-clone-nav d-none d-lg-block">
      <li><a href="/">Home</a></li>
      <li class="active"><a href="shop">Store</a></li>
      <li class="has-children">
        <a href="#">Report</a>
        <ul class="dropdown">
          <li><a href="topMedicine">Top Medicine</a></li>
          <li><a href="topCustomer">Top Customer</a></li>
        </ul>
      </li>
      <li><a href="">Profile</a></li>
      <li><a href="{{route('history')}}">Riwayat Beli</a></li>
      <li class="has-children">
        <a href="#">User</a>
        <ul class="dropdown">
        @if (Auth::user()->isAdmin())
          <li><a href="listUser">List User</a></li>
          @endif
          <li><a href="editUser">Edit Profile</a></li>
          
        </ul>
      </li>
    </ul>
  </nav>
</div>
@endsection

@section('content')


    <div class="site-section">
      <div class="container">
      
        <div class="row">
          @foreach ($alldata as $li)
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="shop/detail/{{$li->id}}"> <img src="{{asset('medicines_img/'.$li->image)}}" alt="Image" style="width: 200px; height: 200px;"></a>
            <h3 class="text-dark"><a href="shop/detail/{{$li->id}}">{{$li->generic_name}}</a></h3>
            <p class="price">Rp. {{$li->price}}</p>
            <p class="btn-holder"><a href="{{url('add-to-cart/'.$li->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>

@endsection