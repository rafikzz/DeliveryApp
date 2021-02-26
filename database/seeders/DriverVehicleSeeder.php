<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DriverVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'first_name' => 'Bipal',
        	'last_name' => 'Maharjan',
            'email' => 'bipal@mail.com',
            'address' => 'Imadol,Lalitpur',
            'contact_no' => '9842310921',
        ]);
        Vehicle::create([
            'name'=>'Truck',
            'lotno'=>'3424'
        ]);
    }
}
