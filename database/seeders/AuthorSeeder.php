<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'first_name' => 'Fridrih',
            'last_name' => 'Nice'
        ]);

        Author::create([
            'first_name' => 'Herman',
            'last_name' => 'Hese'
        ]);

        Author::create([
            'first_name' => 'Nesa',
            'last_name' => 'Nesic'
        ]);

        Author::create([
            'first_name' => 'Mica',
            'last_name' => 'Micic'
        ]);
    }
}
