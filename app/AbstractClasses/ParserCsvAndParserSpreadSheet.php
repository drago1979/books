<?php


namespace App\AbstractClasses;


abstract class ParserCsvAndParserSpreadSheet
{
    protected $fileRows;
    protected array $columnNames = [];
    protected array $books = [];

    abstract public function parse($file): array;

    abstract protected function getColumnNames(): void;

    public function createArrayKeysFromColumnNames(): void
    {
        foreach ($this->books as &$book) {
            $book = array_combine($this->columnNames, $book);
        }
    }
}
