<?php
class response
{
    public function json(array $data)
    {
        echo json_encode($data);    
    }

    public function header($key, $value)
    {
        header(ucfirst($key) . ':' . $value);
    
    }
}
