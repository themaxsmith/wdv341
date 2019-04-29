<?php
ini_set('display_errors', 1);
require("../unit7/connection.php");
	session_cache_limiter('none');
	session_start();

	if ($_SESSION['validUser'] != "yes")
	{
	  header('Location: ../unit11/login.php');
	}
	error_reporting(E_ALL);



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

	    $statement = $conn->prepare('UPDATE wdv341_event  SET event_name = :event_name, event_description = :event_description, event_presenter = :event_presenter, event_date = :event_date, event_time = :event_time WHERE event_id = :id');

	    $statement->execute([
	        'event_name' => $_POST["event_name"],
	        'event_description' => $_POST["event_description"],
	        'event_presenter' => $_POST["event_presenter"],
	        'event_date' => $_POST["event_date"],
	        'event_time' => $_POST["event_time"],
	        'id' => $_POST["id"]
	    ]);
	      echo "record updated successfully";
					header('Location: ../unit11/displayEvents.php?message=update_success');
	      }
	  catch(PDOException $e)
	      {
	      echo $sql . "<br>" . $e->getMessage();
	      }



	}



$stmt = $conn->prepare("SELECT * FROM wineries WHERE id=?");
$stmt->execute(array($_GET["id"]));
$row = $stmt->fetch();
	?>
	<style>
	#event_location{
	  display:none;
	}
	</style>
	<form name="form" method="post" action="#">
	    Location ID: <input type="text" name="id" value="<?php echo $_GET["id"]?>" id="event_id"><br />
	    Location Name: <input type="text" name="event_presenter"  value="<?php echo $row["name"]?>" id="event_presenter"><br />
	    Address: <input type="text" name="address" value="<?php echo $row["address"]?>" id="event_name"><br />
	    Image URL: <input type="text" name="image_url" value="<?php echo $row["image_url"]?>" id="event_name"><br />
	    <span id="event_location">Location: <input type="text" name="event_location"></span><br />
	    <input type="submit" name="submit" id="submit" value="Submit">

	</form>
	<a href="../unit11/login.php">Go Back Home</a>
