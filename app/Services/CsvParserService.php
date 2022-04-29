<?php


namespace App\Services;


class CsvParserService
{
    public function parse($file)
    {
        if (($csvContent = fopen($file, 'r')) !== FALSE) {
            $row = 0;
            $columnNames = [];
            $books = [];

            while (($csvLine = fgetcsv($csvContent, 250, ",")) !== FALSE) {

                if ($row === 0) {
                    $columnNames = $csvLine;
                    $row++;

                    continue;
                }

                $books[] = $csvLine;
            }

            fclose($csvContent);
        }
//        dd($this->addNamesToFields($columnNames, $books));
       return $this->addNamesToFields($columnNames, $books);
    }

    public function addNamesToFields($columnNames, $books)
    {
        $results = [];

        foreach ($books as $book) {
            $result = [];

            foreach ($book as $index => $bookAttribute) {
                $columnName = $columnNames[$index];

                $result[$columnName] = $bookAttribute;
            }

            $results[] = $result;
        }

//        dd($results);
        return $results;
    }
}
