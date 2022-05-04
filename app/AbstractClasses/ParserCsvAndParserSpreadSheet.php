<?php


namespace App\AbstractClasses;

abstract class ParserCsvAndParserSpreadSheet
{
    protected $fileRows;
    protected array $columnNames = [];
    protected array $books = [];

    /**
     * @param $file
     * @return array
     */
    abstract public function parse($file): array;

    abstract protected function getColumnNames(): void;

    /**
     * Description: Takes column names and sets them as associative array keys.
     *
     */
    public function createArrayKeysFromColumnNames(): void
    {
        foreach ($this->books as &$book) {
            $book = array_combine($this->columnNames, $book);
        }
    }
}
