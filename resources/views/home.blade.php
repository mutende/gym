@extends('layout.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                 <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
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
                                @if($members < 2)
                                    <h3>{{ $members }}</h3>
                                    <p>Membership</p>
                                @else
                                    <h3>{{ $members }}</h3>
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
                                        <label for="Duration">Description</label>
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
                  <th>Duration</th>
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
                            <td>{{ $s->duration }} Hours</td>                          
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
                                                        <label for="className">Class Name</label>
                                                        <input type="text" class="form-control" id="className" name="name" placeholder="Class Name" value="{{$s->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Class Description" rows="4" cols="5">{{$s->description}}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Duration">Description</label>
                                                        <input type="number" class="form-control" id="Duration" name="duration" placeholder="Enter Duration in Hrs" maxlength="2" value="{{$s->duration}}">
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

                                                <button type="submit" class="btn btn-primary" style="width:120px !important;">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
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


