@extends('layouts.index')

@section('content')
    <div class="site-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('user/' . $data->id) }}">

                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $data->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            @if (Auth::user()->isAdmin())
                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                                    <div class="col-md-6">
                                        <input id="role" class="form-control" required type="text" name="role"
                                            value="{{ $data->role }}">
                                    </div>
                                </div>
                            @else
                                <input id="role" type="text" name="role" value="buyer" hidden>
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="editUser">
                                        Edit
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                        Back to Home</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
