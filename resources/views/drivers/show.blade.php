@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Deltail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
    <div class="card-body">
      <div class="form-group">
          <div class="form-group">
              <a class="btn btn-default" href="{{ route('drivers.index') }}">
                  Go Back
              </a>
          </div>
          <table class="table table-bordered ">
              <tbody>

                  <tr>
                      <th>
                         Name
                      </th>
                      <td>
                          {{ $driver->first_name}} {{ $driver->last_name }}
                      </td>
                  </tr>
                  <tr>
                      <th>
                        Email
                      </th>
                      <td>
                          {{ $driver->email }}
                      </td>
                  </tr>
                  <tr>
                      <th>
                        Phone No
                      </th>
                      <td>
                        {{$driver->contact_no}}
                      </td>
                  </tr>

                  <tr>
                      <th>
                       Address
                      </th>
                      <td>
                        {{$driver->address}}
                      </td>
                  </tr>
          </table>
          <div class="form-group">
              <a class="btn btn-default" href="{{ route('drivers.index') }}">
                  Go Back to list
              </a>
          </div>
      </div>
  </div>
</div>

  </div>


@endsection
