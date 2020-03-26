<?php

namespace ToDos\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;
use ToDos\Models\ToDosModel;

class SeeAllToDosController
{
    private $renderer;
    private $toDosModel;

    public function __construct(PhpRenderer $renderer, ToDosModel $toDosModel)
    {
        $this->renderer = $renderer;
        $this->toDosModel = $toDosModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['ToDos'] = $this->toDosModel->retrieveAllToDos();
        return $this->renderer->render($response, 'index.phtml', $args);
    }
}