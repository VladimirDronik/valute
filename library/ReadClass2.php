<?php
/**
 * Класс потомок абстарктного класса ReadClass. В данном случае он использует функцию родительского класса, однако можно
 * создать на основе этой функции и свою, которая будет реализовывать свои методы применительно к выбранному ресурсу
 */

namespace library;


class ReadClass2 extends ReadClass
{
    public $resource = '';


public function read()
{

    return parent::readJSON(); // Можно создать свою обработку на основе родительской
}

}