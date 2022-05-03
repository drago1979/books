<?php


namespace App\Factories;


use App\Exceptions\InvalidFileTypeException;
use App\Services\ParserCsvService;
use App\Services\ParsersSpreadSheetService;
use App\Services\ParserXmlService;

class ParserFactory
{
    /**
     * @param $fileType
     * @return ParserCsvService|ParsersSpreadSheetService|ParserXmlService|\Illuminate\Contracts\Foundation\Application|mixed
     * @throws InvalidFileTypeException
     */
    public static function getParser($fileType)
    {
        switch ($fileType) {
            case 'text/csv':
                return app(ParserCsvService::class);
            case 'text/xml':
                return app(ParserXmlService::class);
            case 'application/vnd.ms-excel':
                return app(ParsersSpreadSheetService::class, [
                        'reader' => app(\PhpOffice\PhpSpreadsheet\Reader\Xls::class)
                    ]);
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                return app(ParsersSpreadSheetService::class, [
                        'reader' => app(\PhpOffice\PhpSpreadsheet\Reader\Xlsx::class)
                    ]);
            default:
                throw new InvalidFileTypeException();
        }
    }
}

