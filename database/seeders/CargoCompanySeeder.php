<?php

namespace Database\Seeders;

use App\Models\CargoCompany;
use Illuminate\Database\Seeder;

class CargoCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargoCompanies = [
            ['name' => 'Aras Kargo'],
            ['name' => 'Yurtiçi Kargo'],
            ['name' => 'MNG Kargo'],
            ['name' => 'Sürat Kargo'],
            ['name' => 'PTT Kargo'],
            ['name' => 'UPS Kargo'],
            ['name' => 'TNT Kargo'],
            ['name' => 'Fillo Kargo'],
        ];

        foreach ($cargoCompanies as $cargoCompany) {
            CargoCompany::create(
                $cargoCompany
            );
        }
    }
}
