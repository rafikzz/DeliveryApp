@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="content-fluid">
    	<div >
    		<h1>List Vehicle</h1>
    	<div>
    		<a class="btn btn-primary" href="{{ route("vehicles.create") }}">Add Vehicle</a>
    	</div>
	<table class="table" id="table">
		<thead>

			<td>S.N.</td>
			<td>Name</td>
			<td>lotno</td>
			<td>Created At</td>
			<td>Updated At</td>
			<td>Action</td>
		</thead>
        <tbody>
            @foreach ($vehicle as $item)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['lotno']}}</td>
                <td>{{$item['created_at']}}</td>
                <td>{{$item['updated_at']}}</td>
                <td><a class="btn btn-xs btn-primary" href="{{route('vehicles.edit',$item->id)}}">  Edit</a>
                <form action="{{route('vehicles.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    @csrf
                    <input type="submit" class="btn btn-xs btn-danger" value="delete">
                </form></td>

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

	{{-- <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">lotno</th>
    </tr>
  </thead>

</table>

<table class="table">
  <thead class="thead-light">
    <tbody>
    @foreach ($work as $item)
		<tr>
			<td>{{$item['id']}}</td>
			<td>{{$item['name']}}</td>
			<td>{{$item['lotno']}}</td>
			<td><a href="{{"delete/".$item['id']}}">Delete</a></td>
			<td><a href="{{"edit/".$item['id']}}">Edit</a></td>
		</tr>

		@endforeach
    <tr>
  </tbody>
  </thead>
</table> --}}
