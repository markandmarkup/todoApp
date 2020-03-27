<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\AddToDoController;
use ToDos\Models\ToDosModel;

class AddToDoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbConnection = $container->get('dbConnection');
        $toDosModel = new ToDosModel($dbConnection);
        return new AddToDoController($toDosModel);
    }
}