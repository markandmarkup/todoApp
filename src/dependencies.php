<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['dbConnection'] = function ($c) {
        $settings = $c->get('settings')['db'];
        $db = new \PDO($settings['host'] . $settings['dbName'], $settings['user'], $settings['password']);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    };

    $container['ToDosModel'] = new \ToDos\Factories\ToDosModelFactory();

    $container['SeeAllToDosController'] = new \ToDos\Factories\SeeAllToDosControllerFactory();

    $container['AddToDoController'] = new \ToDos\Factories\AddToDoControllerFactory();

    $container['DeleteToDoController'] = new \ToDos\Factories\DeleteToDoControllerFactory();

    $container['CompleteToDoController'] = new \ToDos\Factories\CompleteToDoControllerFactory();

    $container['EditToDoController'] = new \ToDos\Factories\EditToDoControllerFactory();

};
