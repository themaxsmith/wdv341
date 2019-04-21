<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_cache_limiter('none');
session_start();

	if ($_SESSION['validUser'] == "yes")
	{

    $username = $_SESSION["userName"];
		$message = "Welcome Back! $username";
	}
	else
	{
		if (isset($_POST['submitLogin']) )
		{
			$inUsername = $_POST['loginUsername'];
			$inPassword = $_POST['loginPassword'];

			require("../unit7/connection.php");




			$sql = "SELECT event_user_name,event_user_password FROM event_user WHERE event_user_name = ? AND event_user_password = ?";

    $query = $conn->prepare($sql);
    $query->execute(array($inUsername,$inPassword));
    $row = $query -> fetch();
    $userName = $row["presenters_user_name"];

    if($query->rowCount() == 1) {
				$_SESSION['validUser'] = "yes";
        $_SESSION["userName"] = $userName;
				$message = "Welcome Back! $userName";

			}
			else
			{

				$_SESSION['validUser'] = "no";
				$message = "Sorry, there was a problem with your username or password. Please try again.";
			}

			$conn = null;

		}
		else
		{

		}

	}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>


<h2><?php echo $message?></h2>

<?php
	if ($_SESSION['validUser'] == "yes")
	{


?>
		<h3>Options</h3>
        <p><a href="#">New Event</a></p>
        <p><a href="#">List Events</a></p>
        <p><a href="logout.php">Logout</a></p>
<?php
	}
	else
	{
?>
                <form method="post" name="loginForm" action="login.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
                </form>
<?php
	}
?>


</body>
</html>
