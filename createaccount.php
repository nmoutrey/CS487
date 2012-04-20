<?php

$connection = mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$cusername = $_POST['username'];
$cpassword = $_POST['password'];
$cfirsname = $_POST['firstname'];
$clastname = $_POST['lastname'];

$flag2 = false;
$flag3 = false;
$flag4 = false;
$flag5 = false;

if ($cusername == "" || $cpassword == "" || $cfirsname == "" || $clastname == "") { $flag2 = true; }
if (!ctype_alnum($cusername) || !ctype_alnum($cpassword) || !ctype_alnum($cfirsname) || !ctype_alnum($clastname)) { $flag3 = true; }
if (strlen($cusername) < 4 || strlen($cpassword) < 4) { $flag4 = true; }
if (strlen($cusername) > 20 || strlen($cpassword) > 20 || strlen($cfirsname) > 20 || strlen($clastname) > 20) { $flag5 = true; }

if (!$flag2 && !$flag3 && !$flag4 && !$flag5) {
$result = mysql_query("SELECT * FROM ScubaUser WHERE username=\"" . $cusername . "\"");

$row = mysql_fetch_array($result);

$flag = mysql_num_rows($result);
}
?>

<html>
<?php if ($flag == 0 && $flag2 == 0 && $flag3 == 0 && $flag4 == 0 && $flag5 == 0) { ?>
<title>Account Creation Successful</title>
<?php } else { ?>
<title>Account Creation Failed</title>
<?php } ?>

<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>
<tr> <td style="background-color:#80a0ff;" height=20px>

<?php if(isset($_SESSION['username'])) { ?>
<p style="text-align:center;"><a href="userpanel.php?<?php echo SID ?>">Manage Account</a> - <a href="list.php?<?php echo SID ?>">View Available Classes</a> - <a href="schedule.php?<?php echo SID ?>">Sign Up for a Class</a> - <a href="about.php?<?php echo SID ?>">About Us</a></p>
<?php } else { ?>
<p style="text-align:center;"><a href="login.php">Login Page</a> - <a href="list.php">View Available Classes</a> - <a href="about.php">About Us</a></p>
<?php } ?>
</td>
</tr>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if ($flag2) { ?>
<p>This page requires input. Either you accessed this page directly, or you left one or more input fields blank. Please return to the <a href="register.php">Registraton Page</a>.</p>
<?php } else if ($flag3) { ?>
<p>Only alphanumeric characters are allowed as input. Please return to the <a href="register.php">Registration Page</a>.</p>
<?php } else if ($flag4) { ?>
<p>Your username and password must both be at least 4 characters long. Please return to the <a href="register.php">Registration Page</a>.</p>
<?php } else if ($flag5) { ?>
<p>All input is capped at 20 characters. In order to proceed, please choose a shorter username or password. Please return to the <a href="register.php">Registration Page</a>.</p>
<?php } else if (!$flag) {
$query = "INSERT INTO ScubaUser VALUES('$cusername','$cpassword','$cfirsname','$clastname',0);";
mysql_query($query);
?>

<p>Your account is now created. You can proceed to the <a href="login.php">Login Page</a> to begin using it.</p></br>

<?php } else if ($flag) { ?>
<p>That username is taken. Please go back and <a href="register.php">Try Again</a></p>
<?php } else { ?>
<p>Error message.</p>
<?php } ?>

</td>
</tr>

<tr valign="bottom">
<td style="background-color:#80a0ff; text-align:center;" height=20px>
<a href="home.php">Return to Home</a><br>
Nicholas Moutrey - CS 487 - IIT</td>
</tr>
</table>

</body>
</html>
