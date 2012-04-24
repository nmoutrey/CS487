<?php session_start(); 

/* 

This file is a part of Scuba School CS 487 Project Website.

Scuba School CS 487 Project Website is free software: you can
redistribute it and/or modify it under the terms of the GNU
General Public License as published by the Free Software Foundation,
either version 3 of the License, or (at your option) any later version.

Foobar is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Scuba School CS 487 Project Website.  If not, see <http://www.gnu.org/licenses/>.

*/



?>

<html>
<title>Change Password</title>
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

$mpassword = $_SESSION['password'];
$ppassword = $_POST['currentpassword'];
$npassword = $_POST['newpassword'];

$flag1 = false;
$flag2 = false;
$flag3 = false;
$flag4 = false;
$flag5 = false;

if (!ctype_alnum($ppassword) || !ctype_alnum($npassword)) { $flag1 = true; }
if (strlen($ppassword) > 20 || strlen($npassword) > 20) { $flag2 = true; }
if (strlen($ppassword) < 4 || strlen($npassword) < 4) { $flag4 = true; }
if ($ppassword == "" || $npassword == "") {$flag3 = true; }
if (strcmp($mpassword,$ppassword) != 0) { $flag5 = true; }

if ($flag3) { ?>
<p>This page requires input. Either you left one or more input fields blank, or you navigated to this page directly. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else if ($flag1) { ?>
<p>Only alphanumeric characters are allowed. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else if ($flag2) { ?>
<p>Input is capped at a length of 20 characters. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else if ($flag4) { ?>
<p>Input must be at least 4 characters. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else if ($flag5) { ?>
<p>The current password you put in does not match your true password. Please return to the <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a>.
<?php } else {

mysql_query("UPDATE ScubaUser SET password =\"" . $npassword . "\" WHERE username=\"" . $_SESSION['username'] . "\"") or die(mysql_error());

$_SESSION['password'] = $npassword;

?>
<p>Your password has been changed. You may now return to your <a href="userpanel.php?<?php echo SID ?>">User Control Panel</a></p>
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
