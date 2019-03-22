
<?php

require("../unit7/connection.php");
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
  </tr>

    <?php
      try {
    $data = $conn->query("SELECT * FROM wdv341_event WHERE event_name='How to build a computer' LIMIT 1")->fetchAll();
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
        echo "</tr>\n";
    }
  }
catch(PDOException $e)
  {

  echo $sql . "<br>" . $e->getMessage();
  }

    ?>



</table>
