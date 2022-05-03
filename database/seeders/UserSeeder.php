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
            'is_admin' => 1,
            'name' => 'Evil Twin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2021-05-11 20:30:47',
            'password'  => bcrypt('admin'),
        ]);
    }
}
