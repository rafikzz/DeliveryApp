@extends('layouts.master')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
         <div class="card-body">
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

                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header ">
                          <h3 class="title white">Assign Delivery</h3>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div>

                        </div>
                        <form method="POST" action="{{ route("assigndeliveries.store") }}" role="form"   >
                            @csrf
                          <div class="card-body pb-3 ">
                            <div class="pb-3">


                                <input type="hidden" class="form-control"  value="{{ $delivery->id }}" name="delivery_id" >
                                <div class="col d-flex">
                                    <div class="form-group col-4">
                                        <label for="Customer Info">Customer Name</label>
                                        <input type="text" class="form-control" disabled="true" value="{{ $delivery->customer->first_name.' '.$delivery->customer->last_name  }}" required>
                                      </div>
                                      <div class="form-group col-4">
                                        <label for="Customer Info">Contact No.</label>
                                        <input type="text" class="form-control" disabled="true" value="{{ $delivery->customer->contact_no.' '.$delivery->customer->last_name  }}" required>
                                      </div>
                                      <div class="form-group col-4">
                                        <label for="Customer Info">Email</label>
                                        <input type="text" class="form-control" disabled="true" value="{{ $delivery->customer->email.' '.$delivery->customer->last_name  }}" required>
                                      </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="Location">Delivery Loocation</label>
                                    <input type="text" class="form-control" disabled="true" value="{{ $delivery->delivery_address }}" required>
                                  </div>

                                <div class="form-group col-6" >
                                    <label for="driver">Choose driver </label>
                                    <div class="select">
                                    <select name="driver_id" id="driver1">
                                        @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}"> {{ $driver->first_name.' '.$driver->last_name  }}  </option>
                                        @endforeach
                                    </select>
                                    </div>

                                  </div>
                                  <div class="form-group col-6" >
                                    <label for="vehicle">Choose Vehicle </label>
                                    <div class="select">
                                    <select name="vehicle_id" id="vehicle1">
                                        @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}"> {{ $vehicle->name }} </option>
                                        @endforeach
                                    </select>
                                    </div>

                                  </div>




                                  </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </form>
                      </div>
                </div>


            </div>
        </div>
    </section>
</div>
@endsection
