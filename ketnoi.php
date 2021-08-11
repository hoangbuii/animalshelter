<?php
    $db = array (
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'animal_rescure'
    );

    $conn = mysqli_connect(
        $db['server'],
        $db['username'],
        $db['password'],
        $db['dbname']
    );

    if (!$conn) 
        echo 'error' ;

?>