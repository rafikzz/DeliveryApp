@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Driver Management</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('drivers.create') }}"> Register New Driver</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered " id="table">
                <thead>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th width="200px">Action</th>
                </thead>
                <tbody>
                @foreach($drivers as $driver)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $driver->first_name }}</td>
                    <td>{{ $driver->last_name }}</td>
                    <td>{{ $driver->email }}</td>
                    <td>{{ $driver->contact_no }}</td>
                    <td>{{ $driver->address }}</td>
                    <td>{{ $driver->created_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{route('drivers.show',$driver->id)}}">
                            show
                        </a>
                        <a class="btn btn-xs btn-info" href="{{route('drivers.edit',$driver->id)}}">
                            edit
                        </a>
                        <form action="{{route('drivers.destroy',$driver->id)}}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="delete">
                        </form>
                    </td>
                </tr>


                @endforeach
            </tbody>
            </table>

        </div>
    </div>

    </section>

  </div>


@endsection


@section('js')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
    $('#table').DataTable({
        "paging":   true,
        "ordering": true,
        "search":     true
    }

    );
} );
</script>
@endsection
