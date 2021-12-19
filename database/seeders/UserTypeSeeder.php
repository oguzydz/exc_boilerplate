<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'name' => 'Bireysel',
        ]);
        UserType::create([
            'name' => 'Şahıs Şirketi',
        ]);
        UserType::create([
            'name' => 'Limited veya Anonim Şirket',
        ]);
    }
}
