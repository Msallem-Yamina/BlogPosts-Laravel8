@extends('layouts.DashClient')

@section('content')
     <div class="container rounded bg-white mt-5 mb-5">
            <form action="{{ route('editProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row mt-5 p-5">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" src="{{ asset('avatar') }}/{{Auth::user()->image}}"><span class="font-weight-bold">{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
                        <input type="file" class="form-control" name="image">
                    </div>
                <div class="col-md-7 border-right">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right mt-5">Personal Information</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="labels text-right">Name</label> </div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-md-4">
                                <label class="labels"> Phone Number</label></div>
                                <div class="col-md-8">
                                <input type="text" name="numberphone" class="form-control" value="{{Auth::user()->numberphone}}">
                            </div>
                        </div>
                            <div class="form-group row mt-2">
                                <div class="col-md-4">
                                <label class="labels">Address</label></div>
                                <div class="col-md-8">
                                <input type="text" class="form-control" name="adresse" value="{{Auth::user()->adresse}}">
                                </div>
                            </div>
                </div>
                <div class="text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </form>
        </div>

                {{-- Changement de passe --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="text-center"> <h2> Change Password </h2> </div>
                    <div class="card mt-4">
                        @if(session()->has('error'))
                            <span class="alert alert-danger">
                                <strong>{{ session()->get('error') }}</strong>
                            </span>
                        @endif
                        @if(session()->has('success'))
                            <span class="alert alert-success">
                                <strong>{{ session()->get('success') }}</strong>
                            </span>
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('changePassword') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control mb-2 @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password">
                                        @error('current_password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control mb-2 @error('new_password') is-invalid @enderror" name="new_password" autocomplete="password">
                                        @error('new_password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation">
                                        @error('password_confirmation')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mt-3">
                                            Change Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection