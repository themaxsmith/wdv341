<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require("../unit7/connection.php");

	//Get the Event data from the server.


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;
		}

		.displayEvent{
			text_align:left;
			font-size:18px;
		}

		.displayDescription {
			margin-left:100px;
		}
    .future{
      font-style: italic;
    }
    .thisMonth{
      font-weight: bold;
      color: red;
    }
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>
    <h3>??? Events are available today.</h3>

<?php

  try {
$data = $conn->query("SELECT * FROM wdv341_event ORDER BY event_date DESC")->fetchAll();
if (count($data) == 0) {
echo "no rows found";
}
foreach ($data as $row) {

$isThisMonth = False;
$isFuture = False;
  if (date("F Y", strtotime(str_replace('-', '/', $row['event_date']))) == date("F Y")){
    $isThisMonth = True;
  }
  $now = time();
if(strtotime($row['event_date']) > $now) {
  $isFuture = True;
}
?>
	<p>
        <div class="eventBlock">
            <div>
            	<span class="displayEvent <?php if ($isThisMonth){ echo "thisMonth";}?> <?php if ($isFuture){ echo "future";}?>">Event: <?php echo $row['event_name']; ?></span>
                <span>Presenter: <?php echo $row['event_presenter']?></span>
            </div>
            <div>
            	<span class="displayDescription">Description: <?php echo $row['event_description'];?></span>
            </div>
            <div>
            	<span class="displayTime">Time: <?php echo $row['event_time'];?></span>
            </div>
            <div>
            	<span class="displayDate">Date: <?php echo $row['event_date']?></span>
            </div>
        </div>
    </p>

<?php
}
}
catch(PDOException $e)
{

echo $sql . "<br>" . $e->getMessage();
}
	//Close the database connection
?>
</div>
</body>
</html>
