<?php session_start(); ?>

<html>
<title>Change Name</title>
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
<?php if(isset($_SESSION['username'])) { ?>
<?php echo("<p style=\"text-align:right;\">You are logged in, " . $_SESSION['username'] . ". "); ?>
<a href="logout.php?<?php echo SID ?>">Log Out</a>.</p></br>

<?php

$connection = mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$musername = $_SESSION['username'];

$newfirst = $_POST['firstname'];
$newlast = $_POST['lastname'];

$flag1 = false;
$flag2 = false;
$flag3 = false;

if (!ctype_alnum($newfirst) || !ctype_alnum($newlast)) { $flag1 = true; }
if (strlen($newfirst) > 20 || strlen($newlast) > 20) { $flag2 = true; }
if ($newfirst == "" || $newlast == "") {$flag3 = true; }

if ($flag3) { ?>
<p>This page requires input. Either you left one or more input fields blank, or you navigated to this page directly. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else if ($flag1) { ?>
<p>Only alphanumeric characters are allowed. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else if ($flag2) { ?>
<p>Input is capped at a length of 20 characters. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else {

mysql_query("UPDATE ScubaUser SET firstname =\"" . $_POST['firstname'] . "\", lastname=\"" . $_POST['lastname'] . "\" WHERE username=\"" . $musername . "\"") or die(mysql_error());

$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];

$derp = mysql_query("SELECT * FROM ScubaUser WHERE username=\"" . $musername . "\"");

$row = mysql_fetch_array($derp);
?>
<p>Your name has been changed to <?php echo($row["firstname"] . " " . $row["lastname"]); ?>. You may now return to your <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a></p>
<?php } } else { ?>

<p>You must be <a href="login.php">Logged In</a> to use this feature.</p>

<?php } ?>

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
