@extends('layouts.index')


@section('content')
<div class="site-section">
  {{-- <a href="" class="bi bi-arrow-left"/> --}}
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
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">
                    <thead>
                      <th>Description</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$data->form}}</td>
                        <td>{{$data->restriction_formula}}</td>
                      </tr>
                      <tr>
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