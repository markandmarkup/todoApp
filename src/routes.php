<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'SeeAllToDosController');

    $app->post('/', 'AddToDoController');

    $app->delete('/', 'DeleteToDoController');

    $app->put('/{id}/complete', 'CompleteToDoController');

    $app->put('/{id}', 'EditToDoController');
};
