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
$name = $_POST['name'];
$description = $_POST['description'];
$location = $_POST['location'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$price = $_POST['price'];
$capacity = $_POST['capacity'];

$key = $_POST['key'];

$emptyflag = false;
$idflag = false;
$nameflag = false;
$locationflag = false;
$descriptionflag = false;
$monthflag1 = false;
$monthflag2 = false;
$monthflag3 = false;
$dayflag1 = false;
$dayflag2 = false;
$dayflag3 = false;
$yearflag1 = false;
$yearflag2 = false;
$yearflag3 = false;
$capacityflag1 = false;
$capacityflag2 = false;
$capacityflag3 = false;
$priceflag1 = false;
$priceflag2 = false;
$priceflag3 = false;

//I did not write this function, I got it off the internet, where it was posted anonymously
function really_is_int($val)
{
    return ($val !== true) && ((string)abs((int) $val)) === ((string) ltrim($val, '-0'));
}

if ($id == "" || $name == "" || $description == "" || $location == "" || $day == "" || $month == "" || $year == "" || $price == "" || $capacity == "" || $key == "") { $emptyflag = true; }
if (!really_is_int($id)) { $idflag = true; }
if (strlen($name) > 30) { $nameflag = true; }
if (strlen($location) > 30) { $locationflag = true; }
if (strlen($description) > 100) { $descriptionflag = true; }
if (!ctype_digit($month)) { $monthflag1 = true; }
else if (!really_is_int($month)) { $monthflag3 = true; }
else if ($month < 1 || $month > 12) { $monthflag2 = true; }
if (!ctype_digit($day)) { $dayflag1 = true; }
else if (!really_is_int($day)) { $dayflag3 = true; }
else if ($day < 1 || $day > 31) { $dayflag2 = true; }
if (!ctype_digit($year)) { $yearflag1 = true; }
else if (!really_is_int($year)) { $yearflag3 = true; }
else if ($year < 2000 || $year > 2100) { $yearflag2 = true; }
if (!ctype_digit($capacity)) { $capacityflag1 = true; }
else if (!really_is_int($capacity)) { $capacityflag3 = true; }
else if ($capacity < 1) { $capacityflag2 = true; }
if (!ctype_digit($price)) { $priceflag1 = true; }
else if (!really_is_int($price)) { $priceflag3 = true; }
else if ($price < 1) { $priceflag2 = true; }

$masterflag = false;
if ($idflag || $nameflag || $locationflag || $descriptionflag || $monthflag1 || $monthflag2 || $monthflag3 || $dayflag1 || $dayflag2 || $dayflag3 || $yearflag1 || $yearflag2 || $yearflag3 || $capacityflag1 || $capacityflag2 || $capacityflag3 || $priceflag1 || $priceflag2 || $priceflag3) { $masterflag = true; }

?>

<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if ($emptyflag) { ?>
<p>This page requires input. Either you navigated to this page directly, or you left one or more input fields blank.</p>
<?php } else if ($masterflag) { ?>
<p>One or more inputs were invalid:</p></br>
<?php if ($idflag) { ?>
<p>The class ID must be a positive integer.</p>
<?php } if ($nameflag) { ?>
<p>The name field has a maximum of 30 characters.</p>
<?php } if ($locationflag) { ?>
<p>The location field has a maximum of 30 characters.</p>
<?php } if ($descriptionflag) { ?>
<p>The description field has a maximum of 100 characters.</p>
<?php } if ($monthflag1) { ?>
<p>The month input must be a positive integer.</p>
<?php } else if ($monthflag3) { ?>
<p>The month input must be a positive integer.</p>
<?php } else if ($monthflag2) { ?>
<p>The month input must be a value between 1 and 12.</p>
<?php } if ($dayflag1) { ?>
<p>The day input must be a positive integer.</p>
<?php } else if ($dayflag3) { ?>
<p>The day input must be a positive integer.</p>
<?php } else if ($dayflag2) { ?>
<p>The day input must be a value between 1 and 31.</p>
<?php } if ($yearflag1) { ?>
<p>The year input must be a positive integer.</p>
<?php } else if ($yearflag3) { ?>
<p>The year input must be a positive integer.</p>
<?php } else if ($yearflag2) { ?>
<p>The year input must be a value between 2000 and 2100.</p>
<?php } if ($capacityflag1) { ?>
<p>The capacity field must be a positive integer.</p>
<?php } else if ($capacityflag3) { ?>
<p>The capacity field must be a positive integer.</p>
<?php } else if ($capacityflag2) { ?>
<p>The capacity field must be a positive integer.</p>
<?php } if ($priceflag1) { ?>
<p>The price field must be a positive integer.</p>
<?php } else if ($priceflag3) { ?>
<p>The price field must be a positive integer.</p>
<?php } else if ($priceflag2) { ?>
<p>The price field must be a positive integer.</p>
<?php } } else if (strcmp($key,"bistriceanu") == 0 || strcmp($key,"Bistriceanu") == 0) {

$result = mysql_query("Select * from ScubaCourse where classID = " . $id);

$flag = mysql_num_rows($result);

$result = mysql_query("SELECT COUNT(*) AS num FROM TakesCourse NATURAL JOIN ScubaCourse WHERE classID =" . $id);

$row = mysql_fetch_array($result);

$cap = $row['num'];

if (!$flag) { ?>
<p>This course does not exist.</p>
<?php } else if ($capacity < $cap) { ?>
<p>You cannot lower the capacity for this course to the specified value.</p>
<p>The number of users already registered is greater than the desired value.</p>
<?php } else {

$success = mysql_query("Update ScubaCourse Set name='" . $name . "', location='" . $location . "', description='" . $description . "', day=" . $day . ", month =" . $month . ", year=" . $year . ", capacity=" . $capacity . ", price=" . $price . " where classID =" . $id);

if ($success) {
echo("<p>Class changed.</p>");
} else { echo("<p>SQL Error.</p>"); }

} } else { echo("Invalid Admin Key"); } ?>

</td>
</tr>

</table>

</body>
</html>
