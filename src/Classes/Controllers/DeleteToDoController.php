<?php

namespace ToDos\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use ToDos\Models\ToDosModel;

class DeleteToDoController
{
    private $toDosModel;

    public function __construct(ToDosModel $toDosModel)
    {
        $this->toDosModel = $toDosModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $requestData = $request->getParsedBody();
        $id = $requestData['id'];
        if($this->toDosModel->deleteToDo($id)){
            return $response->withStatus(200);
        } else {
            return $response->withStatus(500);
        }
    }
}