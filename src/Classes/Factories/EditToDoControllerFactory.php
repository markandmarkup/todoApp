<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\EditToDoController;
use ToDos\Models\ToDosModel;

class EditToDoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbConnection = $container->get('dbConnection');
        $toDosModel = new ToDosModel($dbConnection);
        return new EditToDoController($toDosModel);
    }
}
