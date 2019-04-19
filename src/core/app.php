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

        if (!$this->request) {
            $this->request = new Request;
        }

        if (!$this->response) {
            $this->response = new Response;
        }

        $this->dispatch($uri);

        $controller = new $this->controller;
        

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
            }             

        } else {
            $controller = 'indexController';
            $action = 'indexAction';
            $router = [];
        }

        switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (count($router)) {
                for ($i = 0; $i < count($router); $i += 2) {
                    $this->request->$router[$i] = $router[$i + 1];
                }
            }
            break;
        case 'POST':
            foreach ($_POST as $k => $v) {
                $this->request->$k = $v;
            }
            break;
        default:
            break;
        }

        $this->controller = $controller;
        $this->action = $action;

        define('CONTROLLER_NAME', $controller);
        define('ACTION_NAME', $action);
    }
}
//end

