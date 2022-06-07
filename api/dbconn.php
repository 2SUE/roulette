<?php
    $dbHost = "127.0.0.1";      
    $dbName = "roulette";     
    $dbUser = "root";       
    $dbPass = "1234";  

    $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>