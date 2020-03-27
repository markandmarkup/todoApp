<?php

namespace ToDos\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use ToDos\Models\ToDosModel;

class EditToDoController
{
    private $toDosModel;

    public function __construct(ToDosModel $toDosModel)
    {
        $this->toDosModel = $toDosModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formInput = $request->getParsedBody();
        $id = $formInput['id'];
        $title = $formInput['editTitleInput'];

        if ($this->toDosModel->editToDo($id, $title)) {
            return $response->withStatus(200);
        } else {
            return $response->withStatus(500);
        }
    }
}
