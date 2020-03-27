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

    public function addToDo(string $title)
    {
        $query = $this->dbConnection->prepare("INSERT INTO `todos` (`title`) VALUES (:title);");
        $query->bindParam(':title', $title);
        return $query->execute();
    }

    public function deleteToDo(int $toDoId)
    {
        $query = $this->dbConnection->prepare("UPDATE `todos` SET `deleted`=1 WHERE `id`=:id");
        $query->bindParam(':id', $toDoId);
        return $query->execute();
    }

    public function completeToDo(int $toDoId, string $date)
    {
        $query = $this->dbConnection->prepare("UPDATE `todos` SET `completed`=1, `comp_date`=:date WHERE `id`=:id");
        $query->bindParam(':id', $toDoId);
        $query->bindParam(':date', $date);
        return $query->execute();
    }
}