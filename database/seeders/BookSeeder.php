<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'publisher_id' => 1,
            'name' => 'Tako je govorio Zaratustra',
            'date_published' => '21-01-1986'
        ]);

        Book::create([
            'publisher_id' => 2,
            'name' => 'Sidarta',
            'date_published' => '21-01-1991'
        ]);

        Book::create([
            'publisher_id' => 3,
            'name' => 'Neka knjiga M. i N.',
            'date_published' => '21-01-1996'
        ]);

        Book::create([
            'publisher_id' => 2,
            'name' => 'Stepski vuk',
            'date_published' => '21-01-2001'
        ]);

        Book::create([
            'publisher_id' => 3,
            'name' => 'Neka knjiga N.',
            'date_published' => '21-01-2006'
        ]);
    }
}
