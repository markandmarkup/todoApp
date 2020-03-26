<?php

namespace ToDos\Factories;

use Psr\Container\ContainerInterface;
use ToDos\Controllers\SeeAllToDosController;

class SeeAllToDosControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $toDosModel = $container->get('ToDosModel');
        return new SeeAllToDosController($renderer, $toDosModel);
    }
}