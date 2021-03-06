<?php

namespace ToDos\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use ToDos\Models\ToDosModel;

class AddToDoController
{
    private $toDosModel;

    public function __construct(ToDosModel $toDosModel)
    {
        $this->toDosModel = $toDosModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formInput = $request->getParsedBody();
        $title = $formInput['toDoTitle'];
        $this->toDosModel->addToDo($title);
        return $response->withRedirect('/');
    }
}