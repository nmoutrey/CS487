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
<title>Scuba School Registration</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>
<tr> <td style="background-color:#80a0ff;" height=20px>

<?php if(isset($_SESSION['username'])) { ?>
<p style="text-align:center;"><a href="userpanel.php?<php echo SID ?>">Manage Account</a> - <a href="list.php?<php echo SID ?>">View Available Classes</a> - <a href="schedule.php?<php echo SID ?>">Sign Up for a Class</a> - <a href="about.php?<php echo SID ?>">About Us</a></p>
<?php } else { ?>
<p style="text-align:center;"><a href="login.php">Login Page</a> - <a href="list.php">View Available Classes</a> - <a href="about.php">About Us</a></p>
<?php } ?>
</td>
</tr>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if(isset($_SESSION['username'])) { ?>
<?php echo("You are already logged in, " . $_SESSION['username'] . ". If you wish to create a new account, please first "); ?>
<a href="logout.php?<?php echo SID ?>">Log Out</a></br>
<?php } else { ?>
<p>To register for an account, please input your information below.</p></br>

<FORM ACTION="createaccount.php" METHOD=POST>
Username: <INPUT TYPE=TEXT NAME="username"></br>
Password: <INPUT TYPE=TEXT NAME="password"></br>
First Name: <INPUT TYPE=TEXT NAME="firstname"></br>
Last Name: <INPUT TYPE=TEXT NAME="lastname"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM></br>

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
