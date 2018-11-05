<?php

require __DIR__ . '/connection.php';

/**
 * Create a new user
 * 
 * This function creates a new user, saves it to the database and returns is id.
 * 
 * @param string $nickname The new user nickname
 * @param string $password The new user password
 * 
 * @return int
 */

function createUser(string $nickname, string $password, string $email, string $sec_token) : int {
    /**
     * @var PDO $connection
     */  
    global $connection;
    $query = 'insert into User(nickname, `password`, email, sec_token) value(:nickname, :password , :email, :sec_token)';
    $stmt = $connection->prepare($query);
    $stmt->bindValue('nickname', $nickname);
    $stmt->bindValue('password', $password);
    $stmt->bindValue('email', $email);
    $stmt->bindValue('sec_token', $sec_token);
    $result = $stmt->execute();
    
    if(!$result){
        throw new RuntimeException(print_r($connection->errorInfo(), true));
    }
    
    return $connection->lastInsertId();
}

function findOneUserByNickname(string $nickname) : ?array {
    /**
     * @var PDO $connection
     */
    global $connection;
    $prepQuery  = $connection->prepare('select * from User where nickname = :name');
    $prepQuery->bindValue('name', $nickname);
    $result =  $prepQuery->execute();
    
    if ($result === false){
        throw new Exception($connection->errorInfo(), true);
    }
    
    $result = $prepQuery->fetch();
    if ($result){
        return $result;
    }
    return null;
}

/**
 * Log the user with session
 * 
 * Will store the information in the session superglobal. Return true on success, false on failure.
 * @param array $user The user to log
 * @return bool
 */
function login(array $user) : bool{
    
    $_SESSION['USER'] = $user;
    
    return true;
}

/**
 * Get the current user
 * 
 * return the current loggedd in user if exist in the ession. If not, return null
 * 
 * @return array|null
 */
function getCurrentUser() : ?array {
    
    return $_SESSION['USER'] ?? null;
}

/**
 * Logout
 * 
 * Remove the session storage. Return true on success, false on failure .
 * 
 * @return bool
 */
function logout() : bool {
    
    $_SESSION = [];
    session_destroy();
    
    return true;
}

function linkUser(int $projectId, int $user_Id) : bool {
    /**
     * @var PDO $connection;
     */
    global $connection;
    $stmt = "insert into ProjectUser(projectId, userId) value($projectId, $userId)";
    $result = $connection->query($stmt);
    
    if ($result == false){
        throw new RuntimeException($connection->print_r(errorInfo(), true));
    }
    
    if($result){
        return true;
    }
    return false;
}

