@extends('layouts.index')
@section('content')
    <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">
                        <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
                        <h1>Welcome To ApotekU</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check() && Auth::user()->isAdmin())
    @else
        <div class="site-section bg-light">
            {{-- Start Some Data --}}
            <div class="row">
                @foreach ($data as $li)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4"><br>
                        <a href="{{ url('/detail/' . $li->id) }}"> <img src="{{ asset('medicines_img/' . $li->image) }}"
                                alt="Image" style="width: 200px; height: 200px;"></a>
                        <h3 class="text-dark"><a href="{{ url('/detail/' . $li->id) }}">{{ $li->generic_name }}</a></h3>
                        <p class="price">Rp. {{ $li->price }}</p>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('shop') }}" class="btn btn-primary px-4 py-3">View All Products</a>
                </div>
            </div>
    @endif
    {{-- END Some Data --}}
@endsection
