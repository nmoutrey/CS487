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

<?php

$connection = @mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$id = $_POST['id'];

$flag3 = false;
$flag4 = false;

if (!ctype_digit($id)) { $flag3 = true; }

if ($id == "") {$flag4 = true; }

if (!$flag3 && !$flag4) {

$result = mysql_query("SELECT * FROM ScubaCourse WHERE classID = " . $id);

$row = mysql_fetch_array($result);

$flag = mysql_num_rows($result);

$cname = $row['name'];
$cdesc = $row['description'];
$cloc = $row['location'];
$cday = $row['day'];
$cmonth = $row['month'];
$cyear = $row['year'];
$cprice = $row['price'];
$ccap = $row['capacity'];

$result = mysql_query("SELECT COUNT(*) AS num FROM TakesCourse NATURAL JOIN ScubaCourse WHERE classID =" . $id);
$row = mysql_fetch_array($result);
$ctaking = $row['num'];

}

$key = $_POST['key'];
?>

<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php

if ($flag4) { ?>
<p>This page requires input. You either tried to access this page directly, or left one or more input fields blank.</p>
<?php } else if ($flag3) { ?>
<p>The input for Class ID must be a number.</p>
<?php } else if (strcmp($key,"bistriceanu") == 0 || strcmp($key,"Bistriceanu") == 0) {

if (!$flag) { echo("This class ID does not correspond to a currently existing course."); } else {

?>

<p>Class ID: <?php echo $id ?></p>
<p>Class Name: <?php echo $cname ?></p>
<p>Class Description: <?php echo $cdesc ?></p>
<p>Class Location: <?php echo $cloc ?></p>
<p>Class Date: <?php
if ($cmonth) {echo("January ");}
if ($cmonth == 2) {echo("February ");}
if ($cmonth == 3) {echo("March ");}
if ($cmonth == 4) {echo("April ");}
if ($cmonth == 5) {echo("May ");}
if ($cmonth == 6) {echo("June ");}
if ($cmonth == 7) {echo("July ");}
if ($cmonth == 8) {echo("August ");}
if ($cmonth == 9) {echo("September ");}
if ($cmonth == 10) {echo("October ");}
if ($cmonth == 11) {echo("November ");}
if ($cmonth == 12) {echo("December ");}
echo($cday);
if ($cday == 1 || $cday == 21 || $cday == 31) {echo("st");}
else if ($cday == 2 || $cday == 22) {echo("nd");}
else if ($cday == 3 || $cday == 23) {echo("rd");}
else {echo("th");}
echo(", " . $cyear);?></p>
<p>Class Price: <?php echo $cprice ?></p>
<?php if ($ctaking == $ccap) { ?>
<p>Class Capacity: <?php echo("<b>" . $ctaking . "/" . $ccap . "</b>"); ?></p>
<?php } else { ?>
<p>Class Capacity: <?php echo($ctaking . "/" . $ccap); ?></p>
<?php } ?><br><br>


<table border="1" bgcolor="BlanchedAlmond">
<tr>
<td>Username</td>
<td>Password</td>
<td>First Name</td>
<td>Last Name</td>
<td>Money</td>
</tr>

<?php

$result = mysql_query("SELECT * FROM ScubaUser NATURAL JOIN TakesCourse WHERE classID =" . $id);

while ($row = mysql_fetch_array($result) )
{
echo("<tr>");
echo("<td>" . $row["username"] . "</td>");
echo("<td>" . $row["password"] . "</td>");
echo("<td>" . $row["firstname"] . "</td>");
echo("<td>" . $row["lastname"] . "</td>");
echo("<td>" . $row["money"] . "</td>");
echo("</tr>");
}

?>

</table>

<?php } } else { echo("Invalid Admin Key"); } ?>

</td>
</tr>

</table>

</body>
</html>
