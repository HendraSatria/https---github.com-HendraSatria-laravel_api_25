<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $this->call(AuthorBookSeeder::class);

 // Buat 5 penulis
 $authors = [
    ['name' => 'Hendra', 'birthdate' => '2004-07-15'],
    ['name' => 'Andrea Hirata', 'birthdate' => '1979-10-24'],
    ['name' => 'Dee Lestari', 'birthdate' => '1976-01-20'],
    ['name' => 'Habiburrahman El Shirazy', 'birthdate' => '1976-09-30'],
    ['name' => 'Raditya Dika', 'birthdate' => '1984-12-28'],
];
foreach ($authors as $authorData) {
    $author = Author::create($authorData);

    Book::create([
        'title' => 'Buku 1 oleh ' . $authorData['name'],
        'author_id' => $author->id,
        'publication_year' => 2020,
    ]);

    Book::create([
        'title' => 'Buku 2 oleh ' . $authorData['name'],
        'author_id' => $author->id,
        'publication_year' => 2020,
    ]);


    }
    }
}

