<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinceList = RajaOngkir::provinsi()->all();
        foreach ($provinceList as $province) {
            Province::create([
                'name' => $province['province']
            ]);
        }
    }
}
