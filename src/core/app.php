<?php

class App
{
    private $controller = null;
    private $action = null;
    private $request = null;
    private $response = null;

    public function __construct()
    {
    
    }

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $this->dispatch($uri);
        
        $controller = new $this->controller;
        if (!$this->request) {
            $this->request = new Request;
        }

        if (!$this->response) {
            $this->response = new Response;
        }

        call_user_func_array([$controller, $this->action], [$this->request, $this->response]);

    }

    private function dispatch ($uri) 
    {
        $uri = trim($uri, '/');
        if ($uri) {
            $router = explode('/', $uri);
            if (count($router) == 1) {
                $controller = array_shift($router);
                $controller .= 'Controller';
                $action = 'indexAction';
            } else {
                $controller = array_shift($router);
                $controller .= 'Controller';
                $action = array_shift($router);
                $action .= 'Action';

                if (count($router)) {
                    $this->request = new Request;
                    for ($i = 0; $i < count($router); $i += 2) {
                        $this->request->$router[$i] = $router[$i + 1];
                    }
                }
            }             

        
        } else {
            $controller = 'indexController';
            $action = 'indexAction';
        }

        $this->controller = $controller;
        $this->action = $action;

        define('CONTROLLER_NAME', $controller);
        define('ACTION_NAME', $action);
    }
}
//end

