<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\DeleteToDoController;
use ToDos\Models\ToDosModel;

class DeleteToDoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbConnection = $container->get('dbConnection');
        $toDosModel = new ToDosModel($dbConnection);
        return new DeleteToDoController($toDosModel);
    }
}
