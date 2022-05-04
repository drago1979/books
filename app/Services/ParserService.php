<?php


namespace App\Services;


use App\Factories\ParserFactory;

class ParserService
{
    /**
     * @param $file
     * @return array|mixed
     * @throws \App\Exceptions\InvalidFileTypeException
     */
    public static function parse($file)
    {
        $fileType = $file->getClientMimeType();
        $fileExtension = $file->getClientOriginalExtension();

        $parser = ParserFactory::getParser($fileExtension, $fileType);

        return $parser->parse($file);
    }
}
