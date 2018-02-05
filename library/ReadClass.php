<?php
/**
 * Абстрактный класс ReadClass содержит методы базовой обработки XML и JSON. Наследники данного класса могут испольовать
 * данные методы для реализации персональных обработчиков для каждого из предполагаемых ресурсов, а так же создавать свои
 * обработки на основе данных методов
 * Так же для унификации можно создать шаблоны обработки файлов со схожими структурами, используя для
 * этого классы наследники с шаблонами обработки, но это уже другая история ))).
 */

namespace library {



    abstract class ReadClass
    {

        /**
         * Функция чтения из файла для XML
         */
        protected function readXML(){

            $xml = new \SimpleXMLElement(trim($this->resource), NULL, TRUE);
            foreach (($xml->Cube->Cube->Cube) as $item) {
                if ($item->attributes()[0] == 'RUB')
                    return $item->attributes()[1];
            }
        }

        /**
         * Функция чтения из файла JSON
         */
        protected function readJSON(){
            $decode = file_get_contents(trim($this->resource));
            $obj = json_decode($decode);
            return $obj->Valute->EUR->Value;

        }
    }
}