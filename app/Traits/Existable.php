<?php


namespace App\Traits;


use Illuminate\Support\Facades\DB;

trait Existable
{
    public function bookExists($title, $datePublished, $publisherId, $authorId)
    {
        // Check if there is a book with:
        // 1. Same name
        // 2. Same date_published
        // 3. Same publisher
        // 4. Same author

        $book = DB::table('books')
            ->join('author_book', 'books.id', '=', 'author_book.book_id')
            ->where('books.name', '=', $title)
            ->where('books.date_published', '=', $datePublished)
            ->where('books.publisher_id', '=', $publisherId)
            ->where('author_book.author_id', '=', $authorId)
            ->get();

        if ($book->isNotEmpty()) {
            return true;
        }

        return false;
    }
}
