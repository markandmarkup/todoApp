<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\CompleteToDoController;
use ToDos\Models\ToDosModel;

class CompleteToDoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbConnection = $container->get('dbConnection');
        $toDosModel = new ToDosModel($dbConnection);
        return new CompleteToDoController($toDosModel);
    }
}