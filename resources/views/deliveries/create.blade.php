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
            <div class="row ">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Delivery Request</h2>
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

                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header ">
                          <h3 class="title white">Delivery Form</h3>

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
                        <form method="POST" action="{{ route("deliveries.store") }}" role="form"   >
                            @csrf
                          <div class="card-body pb-3 ">
                            <div class="pb-3">
                                <a h></a>
                            <a class="btn btn-success mr-3" id="existing" onclick="existingCustomer() ">Existing Customer</a>
                            <a class="btn btn-warning" id="new" onclick="newCustomer()">New Customer</a>
                            </div>
                                <div class="form-group col-6" id="existingCustomer">
                                    <label for="Customer">Choose Customer </label>
                                    <div class="select">
                                    <select name="customer_id" id="customer1">
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}"> {{ $customer->first_name }} {{ $customer->last_name }} </option>
                                        @endforeach
                                    </select>
                                    </div>

                                  </div>

                                  <div class="form-group col-6 " id="newCustomer" style="display: none">
                                    <div class="row">
                                        <h3>New Customer Details    </h3>
                                        <div class="col-12 d-flex">
                                        <div class="form-group col-6">
                                            <label for="first_nae">First Name</label>
                                            <input type="text" class="form-control new" disabled="true"  name="first_name" placeholder="Enter Your First Name" required>
                                          </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control new" disabled="true"  name="last_name" placeholder="Enter Your Last Name" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control new" disabled="true"   name="email" placeholder="Enter Your Email" required>
                                          </div>
                                          <div class="form-group col-6">
                                            <label for="address">Address </label>
                                            <input type="text" class="form-control new" disabled="true"   name="address" placeholder="Enter Your Address" required>
                                          </div>

                                        </div>
                                        <div class="form-group col-6">
                                            <label for="contact_no">Contact No </label>
                                            <input type="text" class="form-control new" disabled="true" class="new"  name="contact_no" placeholder="Enter Your Address" required>
                                          </div>
                                      </div>
                                    </div>

                                  <div class="form-group col-6">
                                    <label for="Delivery Adress">Delivery Address</label>
                                    <input type="text" class="form-control" name="delivery_address" placeholder="Enter The Delivery Address" required>
                                  </div>



                                  <div class="col pb-3">
                                    <label for="unitId">Choose Quantity </label>
                                    <input type="number" min="1" name="quantity">
                                    <div class="select">
                                        <select name="unit_id" id="unit_id">
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"> {{ $unit->unit_code }}  </option>
                                            @endforeach
                                         </select>
                                    </div>

                                  </div>
                                  <input type="hidden"  name="status_id" value="1">

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
<script type="text/javascript">
$(document).ready(function(){
  $("#existing").click(function(){
    $('#existingCustomer').show();
    $('#newCustomer').hide();
    $('.new').prop("disabled",true);
    $('#customer1').prop("disabled",false);
  });
  $("#new").click(function(){
    $('#existingCustomer').hide();
    $('#newCustomer').show();
    $('.new').prop("disabled",false);
    $('#customer1').prop("disabled",true);
  });
});


</script>
@endsection
