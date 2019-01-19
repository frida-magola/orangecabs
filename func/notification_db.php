<?php 
//connect db via unix socket
//start session
// session_start();  

$user = 'root';
$password = '';
// $db = 'orangecabs_db';
$host = '127.0.0.1';
$port = 3306;

try {
    $link= new PDO("mysql:host=$host;dbname=orangecabs_db;charset=utf8mb4", $user, $password);
    // set the PDO error mode to exception
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>