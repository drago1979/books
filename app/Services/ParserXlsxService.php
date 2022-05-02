<?php


namespace App\Services;


use App\AbstractClasses\Parser;

class ParserXlsxService extends Parser
{
    public function parse($file): array
    {
        // Create a new Xls Reader
//        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();


        // Tell the reader to only read the data. Ignore formatting etc.
        $reader->setReadDataOnly(true);

        // Read the entire spreadsheet file.
        $spreadsheet = $reader->load($file);

        // Read first sheet.
        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $this->fileRows = $sheet->toArray();

        $this->getColumnNames();

        foreach ($this->fileRows as $fileRow) {
            $this->books[] = $fileRow;
        }

        dd($this->createArrayKeysFromColumnNames());
        return $this->createArrayKeysFromColumnNames();
    }

    protected function getColumnNames(): void
    {
        $this->columnNames = array_shift($this->fileRows);
    }
}
