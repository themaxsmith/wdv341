<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>

#orderArea	{
	width:600px;
	border:thin solid black;
	margin: auto auto;
	padding-left: 20px;
}

#orderArea h3	{
	text-align:center;
}
.error	{
	color:red;
	font-style:italic;
}
.m{
  display:none;
}
#textfield5{
	display:none;
}

</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Unit-5 and Unit-6 Self Posting - Form Validation Assignment


</h2>
<p>&nbsp;</p>


<div id="orderArea">
	<?php
	include("vaildation.php");


	if (isset($_POST['name'])){
		if ($_POST['address']==""){

			$vaildate = new vaildations();

			$vaild = true;

			if($vaildate->isEmpty($_POST['name'])){
				echo "Error: Name is empty!<br />";
				$vaild = false;
			}

			if($vaildate->hasSpecial($_POST['name'])){
				echo "Error: Name contains special characters!<br />";
				$vaild = false;
			}

			if($vaildate->hasSpecial($_POST['special'])){
				echo "Error: Special request contains special characters!<br />";
				$vaild = false;
			}

			if($vaildate->notVaildPhone($_POST['number'])){
				echo "Error: phone number can't contain () or - and must be correct length<br />";
				$vaild = false;
			}

			if($vaildate->notVaildEmail($_POST['email'])){
				echo "Error: please make sure your email is correct<br />";
				$vaild = false;
			}

			if (!isset($_POST["badgeHolder"])){
				echo "Error: badgeHolder is not set!<br />";
				$vaild = false;
			}

			if (!isset($_POST["dinnerFri"]) && !isset($_POST["dinnerSat"]) && !isset($_POST["dinnerSun"])){
				echo "Error: please select a dinner!<br />";
				$vaild = false;
			}

			if(strlen($_POST['special']) > 200){
				echo "Error: Special request can't be over 200!<br />";
				$vaild = false;
			}

			if ($vaild){
		echo "Name: ".$_POST["name"]."<br />";
		echo "Number: ".$_POST["number"]."<br />";
		echo "Email: ".$_POST["email"]."<br />";
		echo "Type: ".$_POST["type"]."<br />";
		echo "Badge Holder: ".$_POST["badgeHolder"]."<br />";
		echo "Dinner Friday: ".$_POST["dinnerFri"]."<br />";
		echo "Dinner Saturday: ".$_POST["dinnerSat"]."<br />";
		echo "Dinner Sunday: ".$_POST["dinnerSun"]."<br />";
		echo "Special: ".$_POST["special"]."<br />";
	}
	}
	}
	?>
<form name="form3" method="post" action="#">
  <h3>Customer Registration Form</h3>

      <p>
        <label required for="textfield">Name:</label>
        <input type="text" name="name" value="<?php echo $_POST["name"];?>" id="textfield">
      </p>
      <p>
        <label for="textfield2">Phone Number:</label>
        <input type="text" name="number" value="<?php echo $_POST["number"];?>" id="textfield2">
      </p>
			<p>
				<label class="m" for="textfield5">Address:</label>
				<input type="text" name="address" value="" id="textfield5">
			</p>
      <p>
        <label for="textfield3">Email Address: </label>
        <input type="text" name="email" value="<?php echo $_POST["email"];?>" id="textfield3">
      </p>
      <p>
        <label for="select">Registration: </label>
        <select name="type" selected="<?php echo $_POST["type"];?>" id="select">
          <option disabled hidden value="">Choose Type</option>
          <option <?php if($_POST["type"]=="evt01"){echo "selected";}?>  value="evt01">Attendee</option>
          <option <?php if($_POST["type"]=="evt02"){echo "selected";}?> value="evt02">Presenter</option>
          <option <?php if($_POST["type"]=="evt03"){echo "selected";}?> value="evt03">Volunteer</option>
          <option <?php if($_POST["type"]=="evt04"){echo "selected";}?> value="evt04">Guest</option>
        </select>
      </p>
      <p>Badge Holder:</p>
      <p>
        <input type="radio" name="badgeHolder" id="radio" value="radio" <?php if($_POST["badgeHolder"]=="radio"){echo "checked";}?>>
        <label for="radio">Clip</label> <br>
        <input type="radio" name="badgeHolder" id="radio2" value="radio2" <?php if($_POST["badgeHolder"]=="radio2"){echo "checked";}?>>
        <label for="radio2">Lanyard</label> <br>
        <input type="radio" name="badgeHolder" id="radio3" value="radio3" <?php if($_POST["badgeHolder"]=="radio3"){echo "checked";}?>>
        <label for="radio3">Magnet</label>
      </p>
      <p>Provided Meals (Select all that apply):</p>
      <p>
        <input type="checkbox" <?php if($_POST["dinnerFri"]){echo "checked";}?> name="dinnerFri" id="checkbox">
        <label for="checkbox">Friday Dinner</label><br>
        <input type="checkbox" <?php if($_POST["dinnerSat"]){echo "checked";}?> name="dinnerSat" id="checkbox2">
        <label for="checkbox2">Saturday Lunch</label><br>
        <input type="checkbox" <?php if($_POST["dinnerSun"]){echo "checked";}?> name="dinnerSun" id="checkbox3">
        <label for="checkbox3">Sunday Award Brunch</label>
      </p>
      <p>
        <label for="textarea">Special Requests/Requirements: (Limit 200 characters)<br>
        </label>
        <textarea name="special"  cols="40" rows="5" id="textarea"><?php echo $_POST["special"];?></textarea>
      </p>

  <p>

    <input type="submit" name="button4" id="button4" value="Submit">
  </p>
</form>
</div>

</body>
</html>
