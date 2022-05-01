<?php


namespace App\Factories;


use App\Services\CsvParserService;
use App\Services\XlsxParserService;
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
                return app(XlsxParserService::class);
                break;
            case 'text/xml':
                return app(XmlParserService::class);
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                return app(XlsxParserService::class);
                break;
            default:
                echo 'Unknown File Type';
        }

        switch ($fileType) {
            case 'text/csv':
//                echo 'text/csv';
                return app(CsvParserService::class);
                // Nepotrebno(?):
                break;
            case 'application/vnd.ms-excel':
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':

            return app(XlsxParserService::class);
                break;
            case 'text/xml':
                return app(XmlParserService::class);
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

