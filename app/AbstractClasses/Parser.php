<?php


namespace App\AbstractClasses;


abstract class Parser
{
    protected $fileRows;
    protected array $columnNames = [];
    protected array $books = [];


    abstract public function parse($file): array;

    abstract protected function getColumnNames(): void;

//    public function createArrayKeysFromColumnNames(): array
//    {
////        $keys = array_keys($arr);
////        $keys[array_search($oldkey, $keys)] = $newkey;
////        return array_combine($keys, $arr);
//
//        $results = [];
//
//        foreach ($this->books as $book) {
//            $result = [];
//
//            foreach ($book as $index => $bookAttribute) {
//                $columnName = $this->columnNames[$index];
//
//                $result[$columnName] = $bookAttribute;
//            }
//
//            $results[] = $result;
//        }
//        return $results;
//    }

//    public function createArrayKeysFromColumnNames(): array
//    {
////        $results = [];
//
////        $keys = array_keys($arr);
////        $keys[array_search($oldkey, $keys)] = $newkey;
////        return array_combine($keys, $arr);
//
//
//        foreach ($this->books as $book) {
////            $result = [];
//
//            foreach ($book as $index => $bookAttribute) {
////                $columnName = $this->columnNames[$index];
////
////                $result[$columnName] = $bookAttribute;
//
//                $keys = array_keys($book);
////                        dd($keys);
////                array:4 [▼
//                    //  0 => 0
//                    //  1 => 1
//                    //  2 => 2
//                    //  3 => 3
//                    //]
//
////                dd($keys[array_search($index, $keys)]);
////                    0
//                $keys[array_search($index, $keys)] = $this->columnNames[$index];
//
////                dd($keys[array_search($index, $keys)]);
////                  "Naziv Knjige"
//
//                dd(array_combine($keys, $book));
//
//                        array_combine($keys, $book);
//
//            }
//            dd($book);
//
////            $results[] = $result;
//        }
////        return $results;
//    }

    public function createArrayKeysFromColumnNames(): array
    {
        foreach ($this->books as &$book) {
            $book = array_combine($this->columnNames, $book);
        }
        dd($this->books);
    }
}
