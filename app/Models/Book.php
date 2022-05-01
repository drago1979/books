<?php

namespace App\Models;

use Carbon\Carbon;
use Dotenv\Dotenv;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Mutators
    protected function datePublished(): Attribute
    {
        return Attribute::make(
            set: fn($value) => convertPublishedDateFormatFileToTable($value)
        );
    }

    // Relationships
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // Filters
    public function scopeSearch(Builder $query, $search = '')
    {
        return $query->where('books.name', 'like', "%$search%");

//        $columns = ["customers.id", "customers.first_name", "customers.last_name", "customers.email", "customers.phone"];
//
//        // If the search is empty, return everything
//        if (empty(trim($search))) {
//            return $query;
//        } // If the search contains something, we perform the fuzzy search
//        else {
//            $fuzzySearch = "%$search%";
//            $query->where(function (Builder $query2) use ($columns, $fuzzySearch) {
//                foreach ($columns as $key => $column) {
//                    if ($key == 0) {
//                        $query2->where($column, 'like', $fuzzySearch);
//                    } else {
//                        $query2->orWhere($column, 'like', $fuzzySearch);
//                    }
//                }
//            });
//            return $query;
//        }
    }

    public function scopePublishingTimeRange(Builder $query, $publishingTimeRange = '')
    {
        if ($publishingTimeRange == 0) {
            $rangeLimit = '5';
            $operator = '>';
        }

        if ($publishingTimeRange == 1) {
            $rangeLimit = '10';
            $operator = '>';
        }

        if ($publishingTimeRange == 2) {
            $rangeLimit = '10';
            $operator = '<=';
        }

        $range = Carbon::now()->subYears($rangeLimit)->toDateString();
        return $query->where('date_published', $operator, $range);
    }

    // Other methods
    public static function store($title, $datePublished, $publisher, $author)
    {
        $bookExists = static::query()
            ->join('author_book', 'books.id', '=', 'author_book.book_id')
            ->where('books.name', '=', $title)
            ->where('books.date_published', '=', convertPublishedDateFormatFileToTable($datePublished))
            ->where('books.publisher_id', '=', $publisher->id)
            ->where('author_book.author_id', '=', $author->id)
            ->exists();

        if ($bookExists) {
            return;
        }

        $newBook = static::create([
            'name' => $title,
            'date_published' => $datePublished
        ]);

        $newBook->publisher()->associate($publisher);
        $newBook->save();

        $newBook->authors()->attach($author->id);

    }
}
