<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create([
            'name' => 'Nolit'
        ]);

        Publisher::create([
            'name' => 'Bigz'
        ]);

        Publisher::create([
            'name' => 'Izdavac 1'
        ]);
    }
}
