@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Login') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Enter Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>

                                    <div class="form-group row mb-0 mt-3">
                                       
                                            <button type="submit" class="btn btn-primary" style="width:120px !important;">
                                                {{ __('Login') }}
                                            </button>                                            
                                      
                                    </div>
                                </div>
                        
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
