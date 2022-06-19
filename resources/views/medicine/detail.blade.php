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
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="{{asset('medicines_img/'.$data->image)}}" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{$data->generic_name}}</h2>
            <p></p>
            

            <p><strong class="text-primary h4">Rp. {{$data->price}}</strong></p>

            
            
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
    
            </div>
            <p class="btn-holder"><a href="{{url('add-to-cart/'.$data->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
            @can('delete-permission', $data)
                    <form method="POST" action="{{url('medicine/'.$data->id)}}">
                      @csrf
                      @method("DELETE")
                    
                      <input type="submit" value="Delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record')) return false;">
                      <a class="btn btn-danger btn-xs" onclick="if(confirm('apakah anda yakin??')) deleteDataRemoveTR({{$data->id}})">Delete </a>
                    </form>
            @endcan
            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Specifications</a>
                </li>
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">
                    <thead>
                      <th>Packaging</th>
                      <th>Description</th>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">OTC022401</th>
                        <td>{{$data->form}}</td>
                        <td>{{$data->restriction_formula}}</td>
                      </tr>
                      <tr>
                        <th scope="row">OTC022401</th>
                        <td>{{$data->description}}</td>
                      </tr>

                      
                    </tbody>
                  </table>
                </div>
            
              </div>
            </div>

    
          </div>
        </div>
      </div>
    </div>

    @endsection