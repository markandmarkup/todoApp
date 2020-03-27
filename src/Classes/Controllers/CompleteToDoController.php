<?php

namespace ToDos\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use ToDos\Models\ToDosModel;

class CompleteToDoController
{
    private $toDosModel;

    public function __construct(ToDosModel $toDosModel)
    {
        $this->toDosModel = $toDosModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $today = date("Y-m-d");

        if ($this->toDosModel->completeToDo($id, $today)) {
            return $response->withStatus(200);
        } else {
            return $response->withStatus(500);
        }
    }
}
