<?php 

require_once __DIR__ . '/../model/Feed.php';


try {
    $projects = getAllProjects();
} catch (Exception $e) {
    echo 'An error occured with code : '.$e->getMessage();
    exit;
}

include __DIR__ . '/../view/homepage.html.php';


