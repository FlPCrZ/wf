<?php 

$config = include __DIR__ . '/../config/config.php';

require_once __DIR__ . '/../model/Project.php';

try {
    $projects = getAllProjects();
} catch (Exception $e) {
    echo 'An error ocurred: '.$e->getMessage();
    exit;
}   

var_dump($projects->fetchAll());