<?php


namespace App\Services;


use App\Factories\ParserFactory;

class ParserService
{
    public static function parse($file)
    {
        $fileType = $file->getClientMimeType();

        dd($fileType);

        $parser = ParserFactory::getParser($fileType);

        return $parser->parse($file);
    }
}
