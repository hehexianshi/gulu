<?php
class indexController extends controller
{
    public function indexAction(request $request, response $response)
    {
        $response->write('hello world');
    }
}
//end

