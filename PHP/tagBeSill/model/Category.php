<?php 

require_once __DIR__ . '/connection.php';


function getCategoryAll() : ?array {
    /**
     * @var PDO $connection
     */
    
    global $connection;
    $stmt = 'select label from Category';
    $categories = $connection->query($stmt)->fetchAll();
    
    if ($categories == false){
        throw new RuntimeException($connection->errorInfo());
    }
    
    if ($categories){
        return $categories;
    }
    
    return null;
      
}

function getCategory(string $label) : ?int {
    /**
     * @var PDO $connection
     */
    
    global $connection;
    $stmt = $connection-> prepare('select id from Category where label = :label ');
    $stmt->bindValue('label', $label);
    $result = $stmt->execute();    
    
    if ($result == false){
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    $result = $stmt->fetch()['id'];
    
    if ($result){
        return $result;
    }
    
    return null;
}

function linkCategory(int $projectId, int $categoryId) : bool {
    /**
     * @var PDO $connection;
     */
    global $connection;
    $stmt = "insert into projectcategory(projectId, categoryId) value($projectId, $categoryId)";
    $result = $connection->query($stmt);
    
    if ($result == false){
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    if ($result) {        
        return true;
    }
    return false;
}
