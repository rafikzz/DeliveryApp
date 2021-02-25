@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
         <div class="card-body">
            <div class="row ">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create Driver</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('drivers.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            <br>
            <div class="row">

            </div>

            <div class="card card-primary ">
                <div class="card-header">
                  <h3 class="card-title">Diver Registration Form</h3>
                </div>


                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" action="{{ route("drivers.store") }}" role="form" >
                    @csrf
                  <div class="card-body">
                      <div class="col-12 d-flex">
                        <div class="form-group col-6">
                            <label for="First Name">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name" required>
                          </div>
                          <div class="form-group col-6">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name" required>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email"  placeholder="Enter Your Email" required>
                          </div>

                          <div class="form-group col-12">
                            <label for="exampleInputEmail1">Contact No</label>
                            <input type="text" class="form-control" name="contact_no"  placeholder="Enter Contact No" required>
                          </div>
                          <div class="form-group col-12">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter Your Address" required>
                          </div>



                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>
    </section>
</div>


@endsection
