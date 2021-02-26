<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Unit::create([
           'name'=>'pieces',
           'unit_code'=>'pcs',
       ]);
    }
}
