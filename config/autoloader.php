<?php

namespace EmmaLiefmann\blog\config; 
//where do I call this namespace? is this the right folder? 
class Autoloader 
{
    public static function register()
    {
        spl_autoload_register(([__CLASS__, 'autoload']));
    }

    public static function autoload($class)
    {
        // remove EmmaLiefmann\blog\ from class name
        $class = str_replace('EmmaLiefmann\blog\\', '', $class);
        // replace backslash by slash
        $class = str_replace('\\', '/', $class);
        require './'.$class.'.php';
    }
}