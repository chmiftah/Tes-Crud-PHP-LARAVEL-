<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"admin",
            'last_name'=>"admin",
            'email'=>"admin@admin.com",
            'password'=>bcrypt('password'),
        ]);
    }
}
