<?php 

include('connect.php');

if ($_GET['mobile'] !=="" && $_GET['token'] !=="") {

    $sql = $link->prepare("SELECT * FROM users WHERE mobile=:mobile AND access_token=:token");
    $sql->bindParam(':mobile', $_GET['mobile']);
    $sql->bindParam(':token', $_GET['token']);
    $sql->execute();
    $results = $sql->fetchAll();

    echo json_encode($results);
}

?>