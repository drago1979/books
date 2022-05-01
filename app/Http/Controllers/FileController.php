<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileStoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Services\ParsingService;

class FileController extends Controller
{
    public function create()
    {
        return view('upload.form');
    }

    public function store(FileStoreRequest $request)
    {
        $books = ParsingService::parse($request->file('fileToUpload'));

        foreach ($books as $book) {

            $publisher = Publisher::firstOrCreate([
                'name' => $book['Izdavac']
            ]);

            $author = Author::firstOrCreate([
                'name' => $book['Autor']
            ]);

            Book::store($book['Naziv Knjige'], $book['Godina Izdanja'], $publisher, $author);
        }

        return view('upload.form');
    }
}
