<?php


namespace App\Services;

class ParserXmlService
{
    private $books;

    /**
     * @param $file
     * @return mixed
     */
    public function parse($file)
    {
        libxml_use_internal_errors(TRUE);

        $objXmlDocument = simplexml_load_file($file);

        if ($objXmlDocument === FALSE) {
            echo "There were errors parsing the XML file.\n";
            foreach (libxml_get_errors() as $error) {
                echo $error->message;
            }
            exit;
        }

        $this->books = json_decode(json_encode($objXmlDocument), TRUE)['row'];

        $this->normalizeBooksAttributeNames();

        return $this->books;
    }

    private function normalizeBooksAttributeNames()
    {
        foreach ($this->books as $index => &$item) {
            $item['Naziv Knjige'] = $item['Naziv_Knjige'];
            $item['Godina Izdanja'] = $item['Godina_Izdanja'];

            unset($item['Naziv_Knjige']);
            unset($item['Godina_Izdanja']);
        }
    }
}
