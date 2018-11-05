<?php

require_once  __DIR__ . '/../model/Project.php';
require_once  __DIR__ . '/../model/Category.php';
require_once  __DIR__ . '/../model/Status.php';
require_once  __DIR__ . '/../model/User.php';

$categories = getCategoryAll();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_POST['title']) || empty($_POST['title']) ){
        $errors['title'] = ['title is missing!'];
    }
    if (!isset($_POST['description']) || empty($_POST['description']) ){
        $errors['description'] = ['description is missing!'];
    }
    if ($_POST['status'] === '--' ){
        $errors['status'] = ['status is missing!'];
    }
    
    
    $arrayCat = [];
    foreach($categories as $cat){
        if (!empty($_POST[$cat['label']] )){
            $arrayCat[] = $cat['label'];
            // var_dump($arrayCat);      
        }
    }
    
    //var_dump($_FILES, $_POST['image']);
    $dateTime = new DateTime($_POST['pubDate']);
    if (empty($errors)){
        createProject($_POST['title'], $_POST['description'], $_FILES, $dateTime, $_POST['status'], $arrayCat);
        $success = true;
    }
}
include __DIR__ . '/../view/createProject.html.php';
