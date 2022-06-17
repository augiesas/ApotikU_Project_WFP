@extends('layouts.indexshop')

@section('content')


<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="">Name</th>
                    <th class="">Email</th>
                    <th class="">Role</th>
                    <th class="">Edit</th>
                    <th class="">Delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($alldata as $li)
   
                  <tr>
                    <td class="">
                    <h2 class="h5 text-black">{{$li->name}}</h2>
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{$li->email}}</h2>
                    </td>
                    <td> <h2 class="h5 text-black">{{$li->role}}</h2></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">Edit</button>
                        </div>
                    </td>
                    <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>
      
    </div>
</div>

@endsection