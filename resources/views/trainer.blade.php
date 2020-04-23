@extends('layout.app')
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
            <div class="col-md-4 ml-3">
                <!-- form start -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('trainer.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="roleName">Trainer Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="roleName" placeholder="Enter Trainer Name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary ml-3" style="width:120px !important;">Add Trainer</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-6 offset-md-1">
                <div class="card">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Trainer Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                                @foreach($trainers as $trainer)

                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td>{{ $trainer->name }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('trainer.destroy', $trainer->id) }}">
                                                @csrf
                                                @method("Delete")

                                            <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#role{{$trainer->id}}">
                                                <span class="mr-1"><i class="fas fa-edit"></i></span> Edit
                                            </button>

                                            <button type="submit" class="btn  btn-sm btn-danger">
                                                <span class="mr-1"><i class="fa fa-trash"></i></span> Delete
                                            </button>

                                            </form>
                                        </td>

                                    </tr>


                                    <!-- Modal -->
                                    <div class="modal fade" id="role{{$trainer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('trainer.update', $trainer->id) }}" method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="card-body">

                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="roleNameII">Trainer Name</label>
                                                                    <input type="text" class="form-control" name="name" id="roleNameII" value="{{ $trainer->name }}">
                                                                    @error('role')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="card-footer">

                                                            <button type="submit" class="btn btn-primary ml-3" style="width:auto !important;">Update Trainer</button>
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
