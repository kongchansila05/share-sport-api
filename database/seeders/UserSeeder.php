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
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'phone' => '0968877203',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
      
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0968877203',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
      
        User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'phone' => '0968877203',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'general_manager',
            'email' => 'general_manager@gmail.com',
            'phone' => '0968877203',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ]);
    }
}
