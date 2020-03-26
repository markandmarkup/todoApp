<?php

namespace Todos\Factories;

use Psr\Container\ContainerInterface;
use Todos\Controllers\SeeAllToDosController;

class SeeAllToDosControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $toDosModel = $container->get('ToDosModel');
        return new SeeAllToDosController($renderer, $toDosModel);
    }
}