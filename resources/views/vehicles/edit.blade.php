@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="content-fluid">
<form action="{{ route('vehicles.update','$data->id') }}" method="POST">
    @method('PATCh')
    @csrf
    <div>
  <div class="form-group col-sm-6">
    <input type="hidden" name="id" value="{{$data['id']}}">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="{{$data['name']}}" required>
  </div>
  <div class="form-group col-sm-6">
    <label>lotno</label>
    <input type="text" class="form-control" name="lotno"  value="{{$data['lotno']}}" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
</section>
</div>
@stop
