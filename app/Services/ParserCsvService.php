<?php


namespace App\Services;


use App\AbstractClasses\Parser;

class ParserCsvService extends Parser
{
    public function parse($file): array
    {
        if (($this->fileRows = fopen($file, 'r')) !== FALSE) {

            $this->getColumnNames();

            while (($fileRow = fgetcsv($this->fileRows, 250, ",")) !== FALSE) {
                $this->books[] = $fileRow;
            }

            fclose($this->fileRows);
        }

        dd($this->createArrayKeysFromColumnNames());
        return $this->createArrayKeysFromColumnNames();
    }

    protected function getColumnNames(): void
    {
//        dd(fgetcsv($this->fileRows, 250, ","));
        $this->columnNames = fgetcsv($this->fileRows, 250, ",");
//        dd($this->columnNames);
    }
}
