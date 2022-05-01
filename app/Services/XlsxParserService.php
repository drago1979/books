<?php


namespace App\Services;


use App\Traits\CreateArrayKeysFromColumnNames;

class XlsxParserService
{
    use CreateArrayKeysFromColumnNames;

    public function parse($file)
    {
# Create a new Xls Reader
//        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();


// Tell the reader to only read the data. Ignore formatting etc.
        $reader->setReadDataOnly(true);

// Read the spreadsheet file.
        $spreadsheet = $reader->load($file);

        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $fileRows = $sheet->toArray();

// output the data to the console, so you can see what there is.

//        dd($fileRows);

        $rowNumber = 0;
        $columnNames = [];
        $books = [];

        foreach ($fileRows as $fileRow) {
            dd($fileRow);

            if ($rowNumber === 0) {
                $columnNames = $fileRow;
                $rowNumber++;

                continue;
            }
            $books[] = $fileRow;

        }

        return $this->CreateArrayKeysFromColumnNames($columnNames, $books);
    }
}
