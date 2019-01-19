<?php

$user = 'root';
// $db = 'orangecabs_db';
$host = '127.0.0.1';
$port = 3306;
$password ='';

try {
    $link= new PDO("mysql:host=$host;dbname=orangecabs_db;charset=utf8mb4", $user, $password);
    // set the PDO error mode to exception
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//    echo json_encode("Ok");
    
    }
    catch(PDOException $e)
    {
    echo json_encode("Connection failed: " . $e->getMessage());
    }













