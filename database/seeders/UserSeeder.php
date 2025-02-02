<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'email' => 'admin@stockburada.com',
            'name' => 'StockBurada Admin',
            'password' => Hash::make('Stockburada123/*'),
        ]);

        User::create([
            'email' => 'user@stockburada.com',
            'name' => 'StockBurada',
            'password' => Hash::make('Stockburada123/*'),
        ]);
    }
}
