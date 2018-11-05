<?php

require __DIR__ . '/connection.php';
require_once __DIR__ . '/../controller/fileUpload.php';

function getAllProjects() {
    global $connection;
    $statement = 'SELECT p.*, s.label FROM Project as p 
                  INNER JOIN Status as s ON s.id = p.statusId';
    $projects = $connection->query($statement)->fetchAll();
    if ($projects === false) {
        throw new Exception($connection->errorCode());
    }
    
    foreach ($projects as $key => $project) {
        $statement = '
            SELECT c.label FROM Category as c 
            INNER JOIN ProjectCategory as pc ON c.id = pc.categoryId
            WHERE pc.projectId = '.$project['id'];
        $categories = $connection->query($statement)->fetchAll();
        if ($categories === false) {
            throw new Exception($connection->errorCode());
        }
        
        $project['categories'] = $categories;
        $projects[$key] = $project;
    }

    return $projects;
}


function createProject(string $title, string $description, array $image, DateTime $pubDate, string $statusLabel, array $categoryArray) : int {
    /**
     * @var PDO $connection;
     */
    global $connection;
    $stmt = 'insert into Project(title, description, image, publishingDate, statusId) value(:title, :description, :image, :publishingDate, :statusId)';
    $prepStmt = $connection-> prepare($stmt);
    $prepStmt->bindValue('title', $title);
    $prepStmt->bindValue('description', $description);
    
    $filename = 'img/uploads/' . $image['image']['name'];
    $prepStmt->bindValue('image', $filename);
    
    
    $prepStmt->bindValue('publishingDate', $pubDate->format('Y-m-d H:i:s'));
    
    try {
        $prepStmt->bindValue('statusId', getStatus($statusLabel));    
    } catch (Exception $e) {
        echo 'An error ocurred with StatusId: ' . $e->getMessage(); 
        exit();
    }
    
    $result = $prepStmt->execute();
    
    if ($result == false){
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    $result =  $connection->lastInsertId();
    
    try {
        foreach($categoryArray as $cat){
            // var_dump($cat);
            linkCategory($result, getCategory($cat));          
        }
    } catch (Exception $e) {
        echo 'An error ocurred with getCategory: ' . $e->getMessage();
        exit();
    }
    
    try {
        linkUser($result, getCurrentUser()['id']);
    } catch (Exception $e) {
        echo 'An error ocurred with getCurrent: ' . $e->getMessage();
        exit();
    }
    
    
    try {
        addFile();
    } catch (Exception $e) {
        echo 'An error ocurred with ImageUpload: ' . $e->getMessage();
        exit();
    }
    
      
    if ($result){
        return $result;
    }
       
}
