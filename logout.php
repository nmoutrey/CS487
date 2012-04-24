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


$flag = false;

if (!isset($_SESSION['username']))
{
$flag = true;
}

session_destroy();
?>

<html>
<title>Log Out Successful</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr> <td style="background-color:#80a0ff;" height=20px>
<p style="text-align:center;"><a href="login.php">Login Page</a> - <a href="list.php">View Available Classes</a> - <a href="about.php">About Us</a></p>
</td> </tr>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if (!$flag) { ?>
<p>You have been logged out. You can return to our homepage <a href="home.php">Here</a></p>
<?php } else { ?>
<p>You must be logged in to use this feature.</p>
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
