<?php


namespace App\Services;


use App\Traits\CreateArrayKeysFromColumnNames;

class CsvParserService
{
    use CreateArrayKeysFromColumnNames;

    public function parse($file)
    {
        if (($csvContent = fopen($file, 'r')) !== FALSE) {
            $rowNumber = 0;
            $columnNames = [];
            $books = [];

            while (($fileRow = fgetcsv($csvContent, 250, ",")) !== FALSE) {

                dd($fileRow);

                if ($rowNumber === 0) {
                    $columnNames = $fileRow;
                    $rowNumber++;

                    continue;
                }

                $books[] = $fileRow;
            }

            fclose($csvContent);
        }
       return $this->CreateArrayKeysFromColumnNames($columnNames, $books);
    }
}
