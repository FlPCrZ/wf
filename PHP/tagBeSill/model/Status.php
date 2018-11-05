<?php 

require_once __DIR__ . '/connection.php';


function getStatusAll() : ?array {
    /**
     * @var PDO $connection
     */
    
    global $connection;
    $stmt = 'select label from Status';
    $categories = $connection->query($stmt)->fetchAll();
    
    if ($categories == false){
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    if ($categories){
        return $categories;
    }
    
    return null;
    
}


function getStatus(string $label) : ?int {
    /**
     * @var PDO $connection
     */
    
    global $connection;
    $stmt = $connection-> prepare('select id from Status where label = :label ');
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
