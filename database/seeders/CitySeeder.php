<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cityList = RajaOngkir::kota()->all();
        foreach ($cityList as $city) {
            City::create([
                'name' => $city['city_name'],
                'province_id' => $city['province_id'],
            ]);
        }
    }
}
