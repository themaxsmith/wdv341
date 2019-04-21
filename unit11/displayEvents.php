
<?php
session_cache_limiter('none');
session_start();

if ($_SESSION['validUser'] != "yes")
{
  header('Location: ../unit11/login.php');
}
require("../unit7/connection.php");
if (isset($_GET["message"])){
  echo "<br /><b style='color:blue;'>".$_GET["message"]."</b>";
}
?>
<br />

<h1>Events List</h1>
<table>
  <tr>
    <th>Event Name</th>
    <th>Description</th>
    <th>Presenter</th>
    <th>Date</th>
    <th>Time</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>

    <?php
      try {
    $data = $conn->query("SELECT * FROM wdv341_event")->fetchAll();
if (count($data) == 0) {
  echo "no rows found";
}
    foreach ($data as $row) {
      echo "<tr>\n";
        echo "<td>".$row['event_name']."</td>\n";
        echo "<td>".$row['event_description']."</td>\n";
        echo "<td>".$row['event_presenter']."</td>\n";
        echo "<td>".$row['event_date']."</td>\n";
        echo "<td>".$row['event_time']."</td>\n";
        echo "<td><a href=\"../unit13/updateEventForm.php?id=".$row['event_id']."\">Update</a></td>\n";
        echo "<td><a href=\"../unit12/deleteEvent.php?id=".$row['event_id']."\">Delete</a></td>\n";
        echo "</tr>\n";
    }
  }
catch(PDOException $e)
  {

  echo $sql . "<br>" . $e->getMessage();
  }

    ?>



</table>
	<a href="../unit11/login.php">Go Back Home</a>
