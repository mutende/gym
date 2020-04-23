@extends('layout.app')
@section('title','Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-center text-bolder" style="font-weight: bolder; font-size:20px;">{{ __('GFitLife Gym Register') }}</div>

                @if($memberships->count() < 1 or $sessions->count() < 1)
                    <h2 class="text-center text-danger py-5">Wait for the sessions to be set up, for you to register</h2>
                    @else


                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="card-body">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstName" placeholder="Enter First Name" value="{{ old('firstname') }}">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="firstName">Last Name</label>
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="firstName" placeholder="Enter Last Name" value="{{ old('lastname') }}">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="firstName" placeholder="Enter Email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="firstName">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="firstName" placeholder="Phone Number" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                </div>

                                <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Membership</label>
                                    <select class="custom-select" name="membership">

                                        @foreach($memberships as $ms)
                                            <option value="{{$ms->id}}"> {{$ms->membership}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Duration">Session</label>
                                    <select class="custom-select" name="ss">

                                        @foreach($sessions as $ss)
                                            <option value="{{$ss->id}}"> {{$ss->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password" placeholder="Enter Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>


                            </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary ml-3" style="width:120px !important;">Register</button>
                            <a class="btn btn-link ml-3" href="/">
                                <i class="fas fa-arrow-left"></i> Home
                            </a>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
