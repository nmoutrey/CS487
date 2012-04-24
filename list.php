<?php session_start(); ?>

<?php /* 

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

*/ ?>


<html>
<title>Scuba School Classes</title>
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
<p style="text-align:right;">
<?php echo("You are logged in, " . $_SESSION['username'] . ". "); ?>
<a href="logout.php?<?php echo SID ?>">Log Out</a></p></br>
<?php } else
echo("<p align=\"right\">Welcome, Guest. Please <a href=\"register.php\">Create an Account</a>.</p></br>");
?>

<?php

$connection = @mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$result = mysql_query("SELECT * FROM ScubaCourse");

?>

<p>Below is the table of available classes.</p>

<table border="1" bgcolor="BlanchedAlmond">
<tr>
<td>Class ID</td>
<td>Name</td>
<td>Location</td>
<td>Description</td>
<td>Month</td>
<td>Day</td>
<td>Year</td>
<td>Price</td>
<td>Registered</td>
<td>Capacity</td>
</tr>

<?php

while ($row = mysql_fetch_array($result) )
{
echo("<tr>");
echo("<td>" . $row["classID"] . "</td>");
echo("<td>" . $row["name"] . "</td>");
echo("<td>" . $row["location"] . "</td>");
echo("<td>" . $row["description"] . "</td>");
echo("<td>");
if ($row["month"] == 1) {echo("January");}
if ($row["month"] == 2) {echo("February");}
if ($row["month"] == 3) {echo("March");}
if ($row["month"] == 4) {echo("April");}
if ($row["month"] == 5) {echo("May");}
if ($row["month"] == 6) {echo("June");}
if ($row["month"] == 7) {echo("July");}
if ($row["month"] == 8) {echo("August");}
if ($row["month"] == 9) {echo("September");}
if ($row["month"] == 10) {echo("October");}
if ($row["month"] == 11) {echo("November");}
if ($row["month"] == 12) {echo("December");}
echo("</td>");
echo("<td>" . $row["day"] . "</td>");
echo("<td>" . $row["year"] . "</td>");
echo("<td>$" . $row["price"] . "</td>");
$result2 = mysql_query("SELECT COUNT(*) AS num FROM TakesCourse NATURAL JOIN ScubaCourse WHERE classID =" . $row["classID"]);
$row2 = mysql_fetch_array($result2);
echo("<td>" . $row2["num"] . "</td>");
echo("<td>" . $row["capacity"] . "</td>");
echo("</tr>");
}

?>

</table>

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
