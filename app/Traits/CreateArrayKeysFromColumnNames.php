<?php


namespace App\Traits;


trait CreateArrayKeysFromColumnNames
{
    public function CreateArrayKeysFromColumnNames($columnNames, $books)
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
        return $results;
    }
}
