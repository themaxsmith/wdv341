<?php
session_cache_limiter('none');
session_start();

if ($_SESSION['validUser'] != "yes")
{
  header('Location: ../unit11/login.php');
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("../unit7/connection.php");


$vaild = True;
if (!isset($_POST["event_name"])){
  $vaild = False;
}
if (!isset($_POST["event_description"])){
  $vaild = False;
}
if (!isset($_POST["event_presenter"])){
  $vaild = False;
}
if (!isset($_POST["event_date"])){
  $vaild = False;
}
if (!isset($_POST["event_time"])){
  $vaild = False;
}
if (isset($_GET["event_location"])){
  $vaild = False;
}
if ($vaild){


  try {
    $statement = $conn->prepare('INSERT INTO wdv341_event (event_name, event_description, event_presenter, event_date, event_time)
        VALUES (:event_name, :event_description, :event_presenter, :event_date, :event_time)');

    $statement->execute([
        'event_name' => $_POST["event_name"],
        'event_description' => $_POST["event_description"],
        'event_presenter' => $_POST["event_presenter"],
        'event_date' => $_POST["event_date"],
        'event_time' => $_POST["event_time"]
    ]);
      echo "New record created successfully";
      	header('Location: ../unit11/displayEvents.php?message=insert_success');
      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }



}
  $conn = null;
?>
<style>
#event_location{
  display:none;
}
</style>
<form name="form" method="post" action="#">
    Presenter Name: <input type="text" name="event_presenter" id="event_presenter"><br />
    Event Name: <input type="text" name="event_name" id="event_name"><br />
    Description: <textarea rows="4" cols="50" name="event_description" id="event_description"></textarea><br />
    Event: <input type="date" name="event_date"><br />
    Time: <input type="time" name="event_time"><br />
    <span id="event_location">Location: <input type="text" name="event_location"></span><br />
    <input type="submit" name="submit" id="submit" value="Submit">

</form>
<a href="../unit11/login.php">Go Back Home</a>
