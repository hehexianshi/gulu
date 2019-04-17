<?php
class request 
{
    private $params = [];
    public function __get($key)
    {
        return $this->params[$key];
    }


    public function __set($key, $value)
    {
        $this->params[$key] = $value;
    }

}
