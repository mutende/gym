@extends('layout.app')
@section('title','Client')
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
            <div class="col-md-3 ml-3">
                <!-- form start -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Client</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if($memberships->count() == 0 or $sessions->count() == 0)
                    <h2 class="text-center text-warning">Add Memberships and Class Sessions First </h2>
                    @else

                    <form action="{{ route('client.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstName" placeholder="Enter First Name" value="{{ old('firstname') }}">
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="firstName">Last Name</label>
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="firstName" placeholder="Enter Last Name" value="{{ old('lastname') }}">
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="firstName">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="firstName" placeholder="Enter Email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="firstName">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="firstName" placeholder="Phone Number" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                            <label>Membership</label>
                                            <select class="custom-select" name="membership">

                                                @foreach($memberships as $ms)
                                                    <option value="{{$ms->id}}"> {{$ms->membership}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Duration">Session</label>
                                            <select class="custom-select" name="ss">

                                                @foreach($sessions as $ss)
                                                    <option value="{{$ss->id}}"> {{$ss->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>


                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary ml-3" style="width:120px !important;">Add Client</button>
                        </div>
                    </form>
                    @endif
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Membership</th>
                            <th>Sessions</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                                @foreach($users as $user)
                                    @if($user->id == 1)
                                        <?php continue; ?>
                                    @else

                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td>{{ $user->firstname }} {{$user->lastname}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->phone}}</td>
                                        <td>{{ $user->membership->membership }}</td>
                                        <td>
                                            @foreach($user->classsessions as $ssn)
                                            <li>{{ $ssn->name }}</li>
                                            @endforeach


                                        </td>
                                        <td>
                                     <form method="POST" action="{{ route('client.destroy', $user->id) }}">
                                                @csrf
                                                @method("Delete")

                                            <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#user{{$user->id}}">
                                                <span class="mr-1"><i class="fas fa-edit"></i></span> Edit
                                            </button>

                                            <button type="submit" class="btn  btn-sm btn-danger">
                                                <span class="mr-1"><i class="fa fa-trash"></i></span> Delete
                                            </button>

                                            </form>
                                        </td>


                                    </tr>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Client Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('client.update', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="card-body">

                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="firstName">First Name</label>
                                                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstName" placeholder="Enter First Name" value="{{ $user->firstname }}">
                                                                        @error('firstname')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="firstName">Last Name</label>
                                                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="firstName" placeholder="Enter Last Name" value="{{ $user->lastname }}">
                                                                        @error('lastname')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="firstName">Email</label>
                                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="firstName" placeholder="Enter Email" value="{{ $user->email}}">
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="firstName">Phone</label>
                                                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="firstName" placeholder="Phone Number" value="{{ $user->phone }}">
                                                                        @error('phone')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Duration">Membership</label>
                                                                        <select class="custom-select" name="membership">

                                                                            @foreach($memberships as $mbs)
                                                                                <option value="{{$mbs->id}}" @if($user->membership_id == $mbs->id) selected @endif> {{$mbs->membership}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="Duration">Add Sessions To Client</label>
                                                                        <select class="custom-select" name="ss">

                                                                            <option value="">--None--</option>

                                                                            @foreach($sessions as $ss)
                                                                                <option value="{{$ss->id}}"> {{$ss->name}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="card-footer">

                                                            <button type="submit" class="btn btn-primary ml-3" style="width:120px !important;">Update Client</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $no++ ;?>
                                    @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
           </div>
        </div>
    </div>

@endsection
