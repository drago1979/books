<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\BookResourceCollection;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $nameLike = $request->get('name_like');

        $publishingTimeRange = $request->get('date_published_range');

        $books = Book::search($nameLike)
            ->publishingTimeRange($publishingTimeRange)
            ->get();

        return new BookResourceCollection($books);
    }

    public function show(Book $book)
    {
        $date = Carbon::now()->subYears(5)->toDateString();

        return new BookResource($book);
    }
}
