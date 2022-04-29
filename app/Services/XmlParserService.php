<?php


namespace App\Services;


class XmlParserService
{
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

        $objJsonDocument = json_encode($objXmlDocument);
        $arrOutput = json_decode($objJsonDocument, TRUE);

        $arrOutputIndexed = $arrOutput['row'];

        foreach ($arrOutputIndexed as $index => &$item) {
            $item['Naziv Knjige'] = $item['Naziv_Knjige'];
            $item['Godina Izdanja'] = $item['Godina_Izdanja'];

            unset($item['Naziv_Knjige']);
            unset($item['Godina_Izdanja']);
        }

        return $arrOutputIndexed;
    }
}
