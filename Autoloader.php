<?php
namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {
        $trimmed = trim($class, __NAMESPACE__ . "\\");
        $slash = str_replace("\\", "/", $trimmed);
        $file = __DIR__ ."/". $slash .".php";
        if (file_exists($file)) {
            return require_once $file;
        };
    }
} 