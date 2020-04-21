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
                        <h3 class="card-title">Add Membership</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('memberships.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="membership">Membership</label>
                                    <input type="text" class="form-control @error('membership') is-invalid @enderror" name="membership" id="membership" placeholder="Enter Membership" value="{{ old('membership') }}">
                                    @error('membership')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary ml-3" style="width:auto !important;">Add Membership</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-6 offset-md-1">
                <div class="card">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Membership</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                                @foreach($memberships as $m)

                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td>{{ $m->membership }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('memberships.destroy', $m->id) }}">
                                                @csrf
                                                @method("Delete")

                                            <button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#membership{{$m->id}}">
                                                <span class="mr-1"><i class="fas fa-edit"></i></span> Edit
                                            </button>

                                            <button type="submit" class="btn  btn-sm btn-danger">
                                                <span class="mr-1"><i class="fa fa-trash"></i></span> Delete
                                            </button>

                                            </form>
                                        </td>


                                    </tr>


                                    <!-- Modal -->
                                    <div class="modal fade" id="membership{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Membership</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('memberships.update', $m->id) }}" method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="card-body">

                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="membershipII">Membership</label>
                                                                    <input type="text" class="form-control" name="membership" id="membershipII" value="{{ $m->membership }}">
                                                                    @error('membership')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->

                                                        <div class="card-footer">

                                                            <button type="submit" class="btn btn-primary ml-3" style="width:auto !important;">Update Membership</button>
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

@endsection
