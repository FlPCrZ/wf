<?php 
require __DIR__ . '/../model/connection.php';

function getAllProjects(){
    /**
    * @var PDO $connection
    */
    
    global $connection;
    
    $sql = "select * from Projects";
    $projects = $connection->query($sql);
    if ($projects === false) {
        throw new Exception($connection->errorCode());
    }
    
    return $projects;
}