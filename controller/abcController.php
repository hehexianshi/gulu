<?php
class abcController extends controller
{
    public function abcAction(request $request, response $response)
    {
        $data = ['a' => 1, 'b' => 2, 'c' => 3]; 

        $response->header("abc", '100');
        $response->json($data);
    }
}
//end

