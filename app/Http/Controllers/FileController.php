<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidFileTypeException;
use App\Http\Requests\FileStoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Services\ParserService;

class FileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('upload.form');
    }

    /**
     * @param FileStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function store(FileStoreRequest $request)
    {
        try {
            $books = ParserService::parse($request->file('fileToUpload'));
        } catch (InvalidFileTypeException $e) {
            return $e->getMessage();
        }

        foreach ($books as $book) {
            $publisher = Publisher::firstOrCreate([
                'name' => $book['Izdavac']
            ]);

            $author = Author::firstOrCreate([
                'name' => $book['Autor']
            ]);

            Book::store($book['Naziv Knjige'], $book['Godina Izdanja'], $publisher, $author);
        }

        return redirect('dashboard')->with('status', 'File successfully uploaded.');
    }
}
