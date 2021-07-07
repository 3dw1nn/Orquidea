<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' =>'ADMIN',
            'email' => 'admin@gmail.com',
            'password' =>'Admin1234'
        ])->assignRole('ADMINISTRADOR');
        
        User::factory(3)->create();
    }
}
