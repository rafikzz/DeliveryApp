<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(
        [
            'first_name' => 'Rafik',
        	'last_name' => 'Maharjan',
            'email' => 'rafik@mail.com',
            'address' => 'Pilachhen,Lalitpur',
            'contact_no' => '9842310923',


        ]
        );
    }
}
