<?

session_start();
include('notification_db.php');

$query = "UPDATE login_details SET is_type = '".$_POST["is_type"]."'
WHERE login_details_id = '".$_SESSION["login_details_id"]."'";

$statement = $link->prepare($query);

$statement->execute();
?>