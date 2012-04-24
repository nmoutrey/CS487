<?php

session_start();

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

$connection = mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$id = $_POST['cid'];
$cash = $_SESSION['money'];
$flag = false;
$flag3 = false;
$flag4 = false;
$flag2 = false;
$flag6 = false;


if (!ctype_digit($id)) { $flag3 = true; }

if ($id == "") {$flag4 = true; }

if (!$flag3 && !$flag4) {
$result = mysql_query("SELECT * FROM ScubaCourse WHERE classID=\"" . $id . "\"");

$row = mysql_fetch_array($result);

$coursename = $row['name'];
$coursecost = $row['price'];
$coursecap = $row['cap'];

$result = mysql_query("SELECT * FROM TakesCourse WHERE username =\"" . $_SESSION['username'] . "\" AND classID = " . $id . "") or die(mysql_error());

$row = mysql_fetch_array($result);

$flag = mysql_num_rows($result);

$result = mysql_query("SELECT * FROM ScubaCourse WHERE classID = " . $id);

$flag2 = mysql_num_rows($result);

$result = mysql_query("SELECT COUNT(*) AS num FROM TakesCourse NATURAL JOIN ScubaCourse WHERE classID =" . $id);

$row = mysql_fetch_array($result);

$cap = $row['num'];

if ($cap >= $coursecap) { $flag6 = true; } 
}
?>

<html>
<title>Course Registration</title>

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

<?php
if(isset($_SESSION['username'])) {

if($coursecost > $cash) { ?>
<p>You do not have enough money to afford this course.</p>
<p>You can add more money at the User Control Panel.</p>
<?php } else if ($flag4) { ?>
<p>This page requires input. Either you accessed this page directly, or you did not place anything in the input field. Please return to <a href="schedule.php?<?php echo SID ?>">the scheduling page</a> to access normally.</p>
<?php } else if ($flag3) { ?>
<p>You must input a non-negative number.</p>
<?php } else if ($flag) { ?>
<p>You are already registered for this course.</p>
<?php } else if (!$flag2) { ?>
<p>This course does not exist.</p>
<?php } else if ($flag6) { ?>
<p>This class is full.</p>
<?php } else {
$dollars = $cash - $coursecost;
$_SESSION['money'] = $dollars;
mysql_query("UPDATE ScubaUser SET money =" . $dollars . " WHERE username=\"" . $_SESSION['username'] . "\"") or die(mysql_error());
mysql_query("INSERT INTO TakesCourse VALUES (\"" . $_SESSION['username'] . "\"," . $id . ")");
?>
<p>You have registered for the <?php echo($coursename); ?>.</p>
<p>$<?php echo($coursecost); ?> have been deducted from your account.</p>
<?php } ?>

<?php }
else
{
echo("You must be logged in to access this feature.");
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
