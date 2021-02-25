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
                        <h2>Delivery Request Management</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success my-4" href="{{ route('deliveries.create') }}"> Create Delivery Request</a>
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
                    <th>S.N.</th>
                    <th>Customer Name</th>
                    <th>Contact No</th>
                    <th>Delivery Address</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th width="200px">Action</th>
                </thead>
                <tbody>
                @foreach($deliveries as $delivery)


                    <tr style=" background: {{ $delivery->status->color }} ; ">
                        <td>{{ ++$i }}</td>
                        <td>{{ $delivery->customer->first_name." ".$delivery->customer->last_name }}</td>
                        <td>{{ $delivery->customer->contact_no}}</td>
                        <td>{{ $delivery->delivery_address }}</td>
                        <td>{{ $delivery->unit_id }} {{ $delivery->unit->unit_code }}</td>
                        <td>{{ $delivery->status->name }}</td>
                        <td>{{ $delivery->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($delivery->status->name == 'pending')
                            <a class="btn btn-xs btn-info" href="{{route('deliveries.assign',$delivery)}}">
                                Assign
                            </a>
                            @endif

                            <form action="{{route('deliveries.destroy',$delivery->id)}}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
