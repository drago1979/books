<?php


namespace App\Services;


use App\AbstractClasses\ParserCsvAndParserSpreadSheet;

class ParserCsvService extends ParserCsvAndParserSpreadSheet
{
    /**
     * @param $file
     * @return array
     */
    public function parse($file): array
    {
        if (($this->fileRows = fopen($file, 'r')) !== FALSE) {

            $this->getColumnNames();

            while (($fileRow = fgetcsv($this->fileRows, 250, ",")) !== FALSE) {
                $this->books[] = $fileRow;
            }

            fclose($this->fileRows);
        }

        $this->createArrayKeysFromColumnNames();
        return $this->books;
    }

    protected function getColumnNames(): void
    {
        $this->columnNames = fgetcsv($this->fileRows, 250, ",");
    }
}
