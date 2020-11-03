<?php
class Autoloader {
    /**
    * Autolader add
    *
    * @return void
    */
    function load(){
        spl_autoload_register(function ($class) {
            include_once 'core/classes/' . $class . '.php';
        });
    }
}