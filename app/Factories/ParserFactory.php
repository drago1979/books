<?php


namespace App\Factories;


use App\Services\ParserCsvService;
use App\Services\ParserXlsxService;
use App\Services\ParserXmlService;

class ParserFactory
{

    public static function getParser($fileType)
    {
        switch ($fileType) {
            case 'text/csv':
//                echo 'text/csv';
                return app(ParserCsvService::class);
                // Nepotrebno(?):
                break;
            case 'application/vnd.ms-excel':
                return app(ParserXlsxService::class);
                break;
            case 'text/xml':
                return app(ParserXmlService::class);
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                return app(ParserXlsxService::class);
                break;
            default:
                echo 'Unknown File Type';
        }

        switch ($fileType) {
            case 'text/csv':
//                echo 'text/csv';
                return app(ParserCsvService::class);
                // Nepotrebno(?):
                break;
            case 'application/vnd.ms-excel':
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':

            return app(ParserXlsxService::class);
                break;
            case 'text/xml':
                return app(ParserXmlService::class);
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

