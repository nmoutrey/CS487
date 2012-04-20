<?php session_start(); ?>

<html>
<title>Money Transaction</title>
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

$input = $_POST['cash'];

$flag1 = false;
$flag2 = false;

if (!ctype_digit($input)) { $flag1 = true; }
if (ctype_digit($input) && $input <= 0) { $flag2 = true; }

if ($flag1) { ?>
<p>You must input a number for this service. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.</p>
<?php } else if ($flag2) { ?>
<p>The input must be positive for this service. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.</p>
<?php } else {
$musername = $_SESSION['username'];

$result = mysql_query("SELECT * FROM ScubaUser WHERE username=\"" . $musername . "\";") or die(mysql_error());

$row = mysql_fetch_array($result);

$moneyin = $row["money"] + $input;

$success = mysql_query("UPDATE ScubaUser SET Money =\"" . $moneyin . "\" WHERE username=\"" . $musername . "\"") or die(mysql_error());

if (!$success)
{
echo("SQL ERROR");
}
else
{
$_SESSION['money'] = $moneyin;
?>
<p>The money has been added to your account. You may now return to your <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.</p>
<?php } }?>
<?php } else { ?>

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
