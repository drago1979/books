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
    public static function getParser($fileExtension, $fileType)
    {
        // Parses XML files
        if ($fileExtension == 'xml' && $fileType == 'text/xml') {
            return app(ParserXmlService::class);
        }

        // Parses XLS files
        if ($fileExtension == 'xls' && $fileType == 'application/vnd.ms-excel') {
            return app(ParsersSpreadSheetService::class, [
                'reader' => app(\PhpOffice\PhpSpreadsheet\Reader\Xls::class)
            ]);
        }

        // Parses XLSX files
        if ($fileExtension == 'xlsx' && $fileType == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            return app(ParsersSpreadSheetService::class, [
                'reader' => app(\PhpOffice\PhpSpreadsheet\Reader\Xlsx::class)
            ]);
        }

        // Parses CSV files (for Chrome, Microsoft Edge)
        if ($fileExtension == 'csv' && $fileType == 'text/csv') {
            return app(ParserCsvService::class);
        }

        // Parses CSV files (for Mozilla Firefox)
        if ($fileExtension == 'csv' && $fileType == 'application/vnd.ms-excel') {
            return app(ParserCsvService::class);
        }

        // In the case that uploaded file validates as adequate MIME type but parsing not supported
        throw new InvalidFileTypeException();
    }
}
