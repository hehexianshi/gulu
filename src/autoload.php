<?php

class Loader
{
    public function register() 
    {
         spl_autoload_register(array($this, 'loadClass'));
    }

    public function loadClass($class)
    {
        if ($file = $this->getFile($class)) {
            include $file;
            return true;     
        }
        return false;
    }

    private function getFile($class)
    {
        $path = __DIR__ . '/core/' . $class . '.php';
        if(file_exists($path)) {
            return $path; 
        } 

        $path = APP_PATH . '/controller/' . $class . '.php';

        if (file_exists($path)) {
            return $path;
        }


        $path = APP_PATH . '/model/' . $class . '.php';

        if (file_exists($path)) {
            return $path;
        }

        return false;
    }
}

$loader = new Loader;
$loader->register();
//end

