<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DeliveryStatus;
use App\Models\Driver;
use App\Models\Unit;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::latest()->get();
        return view('deliveries.index',compact('deliveries'))->with('i','0');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers= Customer::all();
        $units = Unit::orderBy('name','asc')->get();

        return view('deliveries.create',compact('customers','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->dataValidate();


        if($request['customer_id']){
            $customer_id=$request->customer_id;
            unset($request['customer_id']);
            $customer=Customer::where('id',$customer_id)->get()->first();
        }
        else{

            $fn= $request->first_name;
            $ln = $request->last_name;
            $email =$request->email;
            $address = $request->address;
            $contact_no = $request->contact_no;

            unset($request['first_name']);
            unset($request['last_name']);
            unset($request['email']);
            unset($request['address']);
            unset($request['contact_no']);

            Customer::create([
                'first_name'=> $fn,
                'last_name'=>$ln,
                'email'=>$email,
                'address'=>$address,
                'contact_no'=>$contact_no
            ]);
            $customer=  Customer::orderby('id','desc')->get()->first();

        }

        $customer->deliveries()->create($data);
        return redirect()->route('deliveries.index')->with('success','Delivery has been requested');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function dataValidate(){
        return request()->validate([
            'first_name' => 'required_without:customer_id',
            'last_name' => 'required_without:customer_id',
            'customer_id'=> 'required_without:email',
            'email'=>'required_without:customer_id|email|unique:customers,email',
            'address' => 'required_without:customer_id',
            'contact_no'=>'required_without:customer_id',
            'delivery_address'=> 'required',
            'quantity'=>'required',
            'unit_id'=> 'required',
            'status_id' => 'required',


        ]);
    }
}
