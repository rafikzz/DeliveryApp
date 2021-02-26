<?php

namespace Database\Seeders;

use App\Models\DeliveryStatus;
use Illuminate\Database\Seeder;

class DeliveryStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryStatus::create([
        	'name' => 'pending',
        	'color' => '#FFFF64'


        ]);
        DeliveryStatus::create([
        	'name' => 'delivered',
        	'color' => '#90EE99'


        ]);
        DeliveryStatus::create([
        	'name' => 'canceled ',
        	'color' => '#ff6961'


        ]);
        DeliveryStatus::create([
        	'name' => 'assigned',
        	'color' => '#72bcd7'


        ]);

    }
}
