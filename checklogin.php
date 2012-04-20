<?php

$connection = mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$tusername = $_POST['username'];
$tpassword = $_POST['password'];

$flag2 == false;

if ($tusername == "" || $tpassword == "") { $flag2 = true; }

if (!$flag2) {
$result = mysql_query("SELECT * FROM ScubaUser WHERE username=\"" . $tusername . "\" AND password=\"" . $tpassword . "\"");

$row = mysql_fetch_array($result);

$flag = mysql_num_rows($result);

if($flag == 1)
{
session_start();
}
}
?>

<html>
<?php if ($flag == 1 && $flag2 == 0) { ?>
<title>Log In Successful</title>
<?php } else { ?>
<title>Log In Failed</title>
<?php } ?>

<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>
<tr> <td style="background-color:#80a0ff;" height=20px>

<?php if($flag == 1 || isset($_POST['username'])) { ?>
<p style="text-align:center;"><a href="userpanel.php?<?php echo SID ?>">Manage Account</a> - <a href="list.php?<?php echo SID ?>">View Available Classes</a> - <a href="schedule.php?<?php echo SID ?>">Sign Up for a Class</a> - <a href="about.php?<?php echo SID ?>">About Us</a></p>
<?php } else { ?>
<p style="text-align:center;"><a href="login.php">Login Page</a> - <a href="list.php">View Available Classes</a> - <a href="about.php">About Us</a></p>
<?php } ?>
</td>
</tr>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if ($flag2) { ?>
<p>This page requires input. Either you accessed this page directly, or left one or more input fields blank. To access this page correctly, please return to the <a href="login.php?<?php echo SID ?>">Login Page</a>.
<?php } else if ($flag == 1)
{
$_SESSION['username'] = $row["username"];
$_SESSION['password'] = $row["password"];
$_SESSION['firstname'] = $row["firstname"];
$_SESSION['lastname'] = $row["lastname"];
$_SESSION['money'] = $row["money"];
echo("Welcome, " . $row["firstname"] . " " . $row["lastname"] . "</br>");
?>
<p>You are now logged in. You can return to our <a href="home.php?<?php echo SID ?>">Home Page</a> to continue browsing.</p></br>

<?php }
else
{
echo("That username and password combination does not exist. Please <a href=\"login.php\">try again</a>.");
}
?>

</td>
</tr>

<tr valign="bottom">
<td style="background-color:#80a0ff; text-align:center;" height=20px>
<a href="home.php?<?php echo SID ?>">Return to Home</a><br>
Nicholas Moutrey - CS 487 - IIT</td>
</tr>
</table>

</body>
</html>
