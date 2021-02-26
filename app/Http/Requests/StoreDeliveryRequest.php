<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
        ];
    }
}
