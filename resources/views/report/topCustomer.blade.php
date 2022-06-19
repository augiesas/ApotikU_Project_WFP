@extends('layouts.indexshop')

@section('navbar')
<div class="main-nav d-none d-lg-block">
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <ul class="site-menu js-clone-nav d-none d-lg-block">
      <li><a href="/">Home</a></li>
      <li><a href="shop">Store</a></li>
      <li class="has-children">
        <a class="active" href="#">Report</a>
        <ul class="dropdown">
          <li><a href="topMedicine">Top Medicine</a></li>
          <li class="active"><a href="topCustomer">Top Customer</a></li>
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
    <div class="container">
    <h3>Top 3 Customer</h3>
    <hr> 
    <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Email</th>
            <th>Name</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $list)
          <tr>
                <td>{{ $list->email}}</td>
                <td>{{ $list->name}}</td>
            </tr>
        @endforeach
        
    </div>
    </div>
@endsection