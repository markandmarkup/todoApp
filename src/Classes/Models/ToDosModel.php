<?php

namespace ToDos\Models;

class ToDosModel
{
    private $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function retrieveAllToDos()
    {
        $query = $this->dbConnection->prepare("SELECT `id`, `title`, `completed`, `comp_date` FROM `todos` WHERE `deleted` = 0");
        $query->execute();
        return $query->fetchAll();
    }
}