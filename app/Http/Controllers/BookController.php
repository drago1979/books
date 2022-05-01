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

        echo '<pre>';
        print_r($books);
        return view('upload.form');

        return new BookResourceCollection($books);
    }

    public function show(Book $book)
    {
//        dd($book->date_published);

        $date = Carbon::now()->subYears(5)->toDateString();

        dd($date);

        return new BookResource($book);
    }
}
//$date = Carbon::createFromFormat('d/m/Y', $book->date_published)->toDateString();

//        $date = Carbon::createFromFormat('d/m/Y', '12/05/2022')->toDateString();
