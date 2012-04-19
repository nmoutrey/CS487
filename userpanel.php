<?php session_start(); ?>

<html>
<title>Scuba School User Control Panel</title>
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
<p>Welcome to the User Control Panel.</p></br>
<p><b>Classes Registered</b><p>

<?php

$connection = @mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$result = mysql_query("SELECT * FROM ScubaCourse NATURAL JOIN TakesCourse WHERE username = \"" . $_SESSION['username'] . "\"");

?>

<?php if (!$result) { ?>
<p>You are currently not registered in any courses.</p></br>
<?php } else { ?>
<p>Below is the table of all classes you are currently registered for.</p>

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
$result2 = mysql_query("SELECT COUNT(*) AS num FROM TakesCourse NATURAL JOIN ScubaCourse WHERE classID = " . $row["classID"] . "");
$row2 = mysql_fetch_array($result2);
echo("<td>" . $row2["num"] . "</td>");
echo("<td>" . $row["capacity"] . "</td>");
echo("</tr>");
}

?>

</table></br>
<?php } ?>



<p><b>Change Name</b></p>
<p>Your name is currently registered as <?php echo($_SESSION['firstname'] . " " . $_SESSION['lastname']); ?>.</p>
<p>To change it, enter your new desired name into the fields below.</p>
<FORM ACTION="changename.php" METHOD=POST>
First Name: <INPUT TYPE=TEXT NAME="firstname"></br>
Last Name: <INPUT TYPE=TEXT NAME="lastname"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM></br>
<p><b>Add Money</b></p>
<?php echo("You currently have $" . $_SESSION['money'] . " in your account.");?>
<p>To add more money to your account, enter the amount below.</p>
<FORM ACTION="money.php" METHOD=POST>
$<INPUT TYPE=TEXT NAME="cash"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM></br>

<?php } else { ?>
<p>You are not logged in. To access the user control panel, please <a href="login.php">Log In</a> to your user account.</br>
<p>Alternatively, return to our <a href="home.php">Home Page</a></p>
<?php } ?>
</td>
</tr>

<tr valign="bottom">
<td style="background-color:#80a0ff;text-align:center;" height=20px>
<a href="home.php?<?php echo SID ?>">Return to Home</a><br>
Nicholas Moutrey - CS 487 - IIT</td>
</tr>
</table>

</body>
</html>
