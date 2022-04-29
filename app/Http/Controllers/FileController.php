<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileStoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Services\ParsingService;
use App\Traits\Existable;

class FileController extends Controller
{
    use Existable;

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

            if ($this->bookExists($book['Naziv Knjige'], $book['Godina Izdanja'], $publisher->id, $author->id)) {
                continue;
            }

            $newBook = Book::create([
                'name' => $book['Naziv Knjige'],
                'date_published' => $book['Godina Izdanja']
            ]);

            $newBook->publisher()->associate($publisher);
            $newBook->save();

            $newBook->authors()->attach($author->id);
        }

        return view('upload.form');
    }
}
