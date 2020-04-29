@extends('layout.app')
@section('title','Dashboard')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    @if(Auth::user()->id == 1)
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin Dashboard</h1>
                    </div><!-- /.col -->
                 <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @else
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Client Dashboard</h1>
                            </div><!-- /.col -->
                            <!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
        @endif
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            @if(Auth::user()->id == 1)
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @if($cls < 2)
                                    <h3>{{ $cls }}</h3>
                                    <p>Class</p>
                                @else
                                    <h3>{{ $cls }}</h3>
                                    <p>Classes</p>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('home') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">

                                @if($trainers->count() < 2)
                                    <h3>{{ $trainers->count() }}</h3>
                                    <p>Trainer</p>
                                @else
                                    <h3>{{ $trainers->count() }}</h3>
                                    <p>Trainers</p>
                                @endif

                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('trainer.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @if(($users-1) < 2)
                                <h3>{{ $users-1 }}</h3>
                                    <p>Client</p>
                                @else
                                    <h3>{{ $users-1 }}</h3>
                                    <p>Clients</p>
                                @endif

                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('client.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @if($members->count() < 2)
                                    <h3>{{ $members->count() }}</h3>
                                    <p>Membership</p>
                                @else
                                    <h3>{{ $members->count() }}</h3>
                                    <p>Memberships</p>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('memberships.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row mt-5">
                <section class="col-lg-12  connectedSortable">
                <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add Classes
                </button>
              </div>
            </div>

            <!-- modal -->
            <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add a Class</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="card card-primary">

                          <!-- /.card-header -->
                          <!-- form start -->
                            @if($trainers->count() == 0)

                                <h2 class="text-center text-warning">Add Trainers First </h2>
                                @else

                                <form role="form" method="post" action="{{ route('home.store') }}">
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label for="className">Class Name</label>
                                        <input type="text" class="form-control" id="className" name="name" placeholder="Class Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Class Description" rows="4" cols="5"></textarea>
                                    </div>
                                        <div class="form-group">
                                            <label for="DayId">Day</label>
                                            <select class="custom-select" name="day" id="DayId">

                                                @foreach($weekdays as $day)
                                                    <option value="{{$day->id}}" > {{$day->day}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" name="starttime"/>
                                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                    <div class="form-group">
                                        <label for="Duration">Duration</label>
                                        <input type="number" class="form-control" id="Duration" name="duration" placeholder="Enter Duration in Hrs" maxlength="2">
                                    </div>
                                    <div class="form-group">
                                    <label for="Duration">Trainer</label>
                                         <select class="custom-select" name="trainer">

                                            @foreach($trainers as $tr)
                                                <option value="{{$tr->id}}"> {{$tr->name}}</option>
                                            @endforeach

                                         </select>
                                      </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width:120px !important;">Add</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
            <!-- end modal -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Class</th>
                  <th>Day</th>
                  <th>Start Time</th>
                  <th>Duration</th>
                  <th>Stop Time</th>
                  <th>Trainer</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                    @foreach($sessions as $s)
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->weekday->day}}</td>
                            <td>{{ $s->start_time }}</td>
                            <td>{{ $s->duration }} Hour(s)</td>
                            <td>{{ $s->stop_time }}</td>
                            <td>{{ $s->trainer->name }}</td>
                            <td>{{ $s->description }}</td>
                            <td>

                                <form method="POST" action="{{ route('home.destroy', $s->id) }}">
                                    @csrf
                                    @method("Delete")

                                    <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#session{{$s->id}}">
                                        <span class="mr-1"><i class="fas fa-edit"></i></span> Edit
                                    </button>

                                    <button type="submit" class="btn  btn-sm btn-danger">
                                        <span class="mr-1"><i class="fa fa-trash"></i></span> Delete
                                    </button>

                                </form>
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="session{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Class</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('home.update', $s->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <div class="card-body">

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="classNameII">Class Name</label>
                                                        <input type="text" class="form-control" id="classNameII" name="name" placeholder="Class Name" value="{{ $s->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea type="text" class="form-control" id="description" name="description" rows="4" cols="5">{{ $s->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="DayIdII">Day</label>
                                                        <select class="custom-select" name="day" id="DayIdII">

                                                            @foreach($weekdays as $day)
                                                                <option value="{{$day->id}}" @if($s->day_id == $day->id) selected @endif> {{$day->day}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Start Time</label>

                                                        <div class="input-group date" id="timepickerII" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#timepickerII" data-toggle="datetimepicker" name="starttime" placeholder="{{ $s->start_time  }}"/>
                                                            <div class="input-group-append" data-target="#timepickerII" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                            </div>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Duration">Duration</label>
                                                        <input type="number" class="form-control" id="Duration" name="duration" value="{{ $s->duration }}" maxlength="2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Duration">Trainer</label>
                                                        <select class="custom-select" name="trainer">

                                                            @foreach($trainers as $tr)
                                                                <option value="{{$tr->id}}" @if($s->trainer_id == $tr->id) selected @endif> {{$tr->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>


                                                </div>
                                                <!-- /.card-body -->
                                            <div class="card-footer">

                                                <button type="submit" class="btn btn-primary" style="width:120px !important;">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $no++; ?>
                    @endforeach



                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
                    @else
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

                                        <p class="text-muted text-center">Trainee</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone</b> <a class="float-right">{{ Auth::user()->phone }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Membership</b> <a class="float-right">{{ Auth::user()->membership->membership}}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Enrolled Sessions</b>
                                                <ul>
                                                    @foreach(Auth::user()->classsessions as $ssn)
                                                        <li>
                                                           {{ $ssn->name }} <span class="ml-2">From: {{$ssn->start_time}}</span>   <span class="ml-2">To: {{$ssn->stop_time}}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
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
                                            <li class="nav-item"><a class="nav-link active" href="#sessions" data-toggle="tab"> All Sessions</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="sessions">
                                                <div class="card-body">
                                                    <table id="example2" class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Class</th>
                                                            <th>Day</th>
                                                            <th>Start Time</th>
                                                            <th>Duration</th>
                                                            <th>Stop Time</th>
                                                            <th>Trainer</th>
                                                            <th>Description</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $no = 1; ?>
                                                        @foreach($sessions as $s)
                                                            <tr>
                                                                <td><?php echo $no; ?></td>
                                                                <td>{{ $s->name }}</td>
                                                                <td>{{ $s->weekday->day}}</td>
                                                                <td>{{ $s->start_time }}</td>
                                                                <td>{{ $s->duration }} Hour(s)</td>
                                                                <td>{{ $s->stop_time }}</td>
                                                                <td>{{ $s->trainer->name }}</td>
                                                                <td>{{ $s->description }}</td>
                                                            </tr>

                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="settings">
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
                                                                <div class="form-group">
                                                                    <label for="Duration">Membership</label>
                                                                    <select class="custom-select" name="membership">

                                                                        @foreach($members as $mbs)
                                                                            <option value="{{$mbs->id}}" @if(Auth::user()->membership_id == $mbs->id) selected @endif> {{$mbs->membership}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Duration">Add More Sessions</label>
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
                    @endif
      </div>

    </section>

   </div>
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
@endsection


