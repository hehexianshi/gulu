<?php
class response
{
    public function json(array $data)
    {
        $this->header('Content-Type', 'application/json');
        $this->write(json_encode($data));    
    }

    public function write($str)
    {
        echo $str;
    }

    public function header($key, $value)
    {
        header(ucfirst($key) . ':' . $value);
    
    }
}
