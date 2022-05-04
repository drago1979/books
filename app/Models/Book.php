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
    protected $with = ['authors:id,name', 'publisher:id,name'];

    // Mutators

    /**
     * @return Attribute
     */
    protected function datePublished(): Attribute
    {
        return Attribute::make(
            set: fn($value) => convertPublishedDateFormatFileToTable($value)
        );
    }

    // Relationships

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // Filters

    /**
     * @param Builder $query
     * @param string $search
     * @return Builder|void
     */
    public function scopeSearch(Builder $query, $search = '')
    {
        if (empty($search)) {
            return;
        }
        return $query->where('books.name', 'like', "%$search%");

    }

    /**
     * @param Builder $query
     * @param string $publishingTimeRange
     * @return Builder|void
     */
    public function scopePublishingTimeRange(Builder $query, $publishingTimeRange = '')
    {
        if (empty($publishingTimeRange)) {
            return;
        }

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

    /**
     * @param $title
     * @param $datePublished
     * @param $publisher
     * @param $author
     */
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
