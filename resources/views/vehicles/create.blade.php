@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="content-fluid">
      <form action="{{ route("vehicles.store") }} " method="POST">
    @csrf
    <div>
  <div class="form-group col-sm-6">
    <label>Name</label>
    <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
  </div>
  <div class="form-group col-sm-6">
    <label>lotno</label>
    <input type="text" class="form-control" name="lotno" placeholder="Enter lotno" required>
  </div>
  <div class="pl-3" >
      <button type="submit" class="btn btn-primary" >Submit</button>
  </div>

    </div>
</form>
    </div>
  </section>

</div>


@stop
