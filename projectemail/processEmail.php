<?php

include("Emailer.php");

$testEmail = new emailer();

$testEmail->setSender("support@gametimebroadcast.com");
$testEmail->setTo("max@themaxsmith.com");
$testEmail->setSubject("Hellooo");
$testEmail->setMessage("This is a test");

if ($testEmail->sendMessage()){
  echo "Success - Email Send <br />";
}else{
  echo "Fail - Email Did Not Send <br />";
}

$clientEmail = new emailer();

$clientEmail->setSender("support@gametimebroadcast.com");
$clientEmail->setTo("maxwellgames2@gmail.com");
$clientEmail->setSubject("Hellooo");
$clientEmail->setMessage("This is a test");

if ($clientEmail->sendMessage()){
  echo "Success - Email Send <br />";
}else{
  echo "Fail - Email Did Not Send <br />";
}
?>

<p>Sender Name: <?php echo $testEmail->getSender();?></p>
<p>To Name: <?php echo $testEmail->getTo();?></p>
<p>Subject: <?php echo $testEmail->getSubject();?></p>
<p>Message: <?php echo $testEmail->getMessage();?></p>
