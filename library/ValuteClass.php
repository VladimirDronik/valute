<?php

/**
 * Класс содержит функции получения курса валют с ресурсов, содержащихся в  valute_resources.txt
 */

class ValuteClass {

    public  $valute='';

    /* Читаем файл с ресурсами построчно */
    static private function read_str(){

        $handle = @fopen(Config::get('projectconf.options.file_of_valute_resource'), "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
               if (substr($buffer,0,1)!='#')
               $string_array[] = $buffer;
            }

            /* Добавить позже обработку ошибки чтения из файла */

            fclose($handle);

        }

        return $string_array;
    }


    /* Получение ресурса с валютами */
    public function get_res(){

         $valute_resource = self::read_str();

         foreach ($valute_resource as $resource){
             $resource_string = explode(',',$resource);
             $process_value = $resource_string[1]; //номер обработчика
             $resourceurl = $resource_string[0]; //путь к ресурсу

             /** основываясь на цифре в конце названия ресурса (номер обработчика) -
             *определяем какой класс использовать для обработки
             */
             $process_value = '\library\ReadClass'.trim($process_value);
             $resource_object = new $process_value();

             $resource_object->resource = $resourceurl;

             /** Обрабатываем исключение, если ресурс не доступен для обработчика,
             * то переходим к следующему в списке ресурсу
             */
             try {
                 return $resource_object->read();
             }catch (Exception $exception){

             }

         }

    }



}