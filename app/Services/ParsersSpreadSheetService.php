<?php


namespace App\Services;


use App\AbstractClasses\ParserCsvAndParserSpreadSheet;

class ParsersSpreadSheetService extends ParserCsvAndParserSpreadSheet
{
    protected $reader;

    public function __construct($reader)
    {
        $this->reader = $reader;
    }

    public function parse($file): array
    {
        // Tell the reader to only read the data. Ignore formatting etc.
        $this->reader->setReadDataOnly(true);

        // Read the entire spreadsheet file.
        $spreadsheet = $this->reader->load($file);

        // Read first sheet.
        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $this->fileRows = $sheet->toArray();

        $this->getColumnNames();

        foreach ($this->fileRows as $fileRow) {
            $this->books[] = $fileRow;
        }

        $this->createArrayKeysFromColumnNames();

        return $this->books;
    }

    protected function getColumnNames(): void
    {
        $this->columnNames = array_shift($this->fileRows);
    }
}
