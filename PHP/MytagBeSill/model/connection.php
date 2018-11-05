<?php

try {
    
    $db = $config['db'];
    
    $connection = new PDO(
        'mysql:host='.$db['host'].';dbname='.$db['name'], 
        $db['user'], 
        $db['pass']
    );
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/> You are a Bastard!!!! <br/>";
   exit;
}




