<?php


namespace App\Factories;


use App\Services\CsvParserService;
use App\Services\XmlParserService;

class ParserFactory
{

    public static function getParser($fileType)
    {
        switch ($fileType) {
            case 'text/csv':
//                echo 'text/csv';
                return app(CsvParserService::class);
                // Nepotrebno(?):
                break;
            case 'application/vnd.ms-excel':
                echo 'application/vnd.ms-excel';
                break;
            case 'text/xml':
                return app(XmlParserService::class);
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                echo 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                break;
            default:
                echo 'Unknown File Type';
        }
    }
}


// Allowed MIME file types:
// text/csv
// application/vnd.ms-excel
// text/xml
// application/vnd.openxmlformats-officedocument.spreadsheetml.sheet

