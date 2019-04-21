<?php
session_cache_limiter('none');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SESSION['validUser'] != "yes")
{
  header('Location: ../unit11/login.php');
}
	require("../unit7/connection.php");

$stmt = $conn->prepare("DELETE FROM wdv341_event WHERE event_id = ?");
$stmt->execute(array($_GET["id"]));
$count = $stmt->rowCount();

if ($count==1){
  echo "row effected!";
	header('Location: ../unit11/displayEvents.php?message=delete_success');
}else{
  echo "no row effected!";
	header('Location: ../unit11/displayEvents.php?message=delete_failed');
}
?>
<a href="../unit11/login.php">Go Back Home</a>
