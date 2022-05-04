<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\BookResourceCollection;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /*
     * Enables Filtering as follows:
     * Filtering 1: Search by Book Title; URL query: "name_like"; String; Optional.
     * Filtering 2: Search by Book-publishing-year-range; URL query: "date_published_range";
     *     Integer (values are:
     *                          0 = less than 5 years;
     *                          1 = between 5 and 10 years;
     *                          2 = more than 10 years);
     *     Optional.
     */
    /**
     * @param Request $request
     * @return BookResourceCollection
     */
    public function index(Request $request)
    {
        $nameLike = $request->get('name_like');

        $publishingTimeRange = $request->get('date_published_range');

        $books = Book::search($nameLike)
            ->publishingTimeRange($publishingTimeRange)
            ->get();

        return new BookResourceCollection($books);
    }

    /**
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }
}
