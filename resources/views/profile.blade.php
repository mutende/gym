@extends('layout.app')
@section('title','Profile')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{asset('img/avataaars.svg')}}"
                                 alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}</h3>

                        <p class="text-muted text-center">Admin</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">{{ Auth::user()->phone }}</a>
                            </li>


                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">


                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class=" active nav-link" href="#settings" data-toggle="tab">Update Profile</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class=" active tab-pane" id="settings">
                                <form action="{{ route('client.update', Auth::user()->id) }}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="card-body">

                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="firstName">First Name</label>
                                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstName" placeholder="Enter First Name" value="{{ Auth::user()->firstname }}">
                                                    @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="firstName">Last Name</label>
                                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="firstName" placeholder="Enter Last Name" value="{{ Auth::user()->lastname }}">
                                                    @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="firstName">Email</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="firstName" placeholder="Enter Email" value="{{ Auth::user()->email}}">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="firstName">Phone</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="firstName" placeholder="Phone Number" value="{{ Auth::user()->phone }}">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                            <button type="submit" class="btn btn-primary ml-3" style="auto !important;">Update Profile</button>
                                        </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </div>

@endsection
