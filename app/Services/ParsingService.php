<?php


namespace App\Services;


use App\Factories\ParserFactory;

class ParsingService
{
    public static function parse($file)
    {
        $fileType = $file->getClientMimeType();

        $parser = ParserFactory::getParser($fileType);

//        dd($parser->parse($file));
       return $parser->parse($file);

    }

}
