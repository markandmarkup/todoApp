<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Models\ToDosModel;

class ToDosModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $dbConnection = $container->get('dbConnection');
        return new ToDosModel($dbConnection);
    }
}