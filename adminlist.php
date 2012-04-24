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

$result = mysql_query("SELECT * FROM ScubaUser");

$key = $_POST['key'];

?>

<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if ($key == "") { ?>
<p>This page requires input. You either attempted to access this page directly, or left the input field blank.</p>
<?php } else if (strcmp($key,"bistriceanu") == 0 || strcmp($key,"Bistriceanu") == 0) {

?>

<table border="1" bgcolor="BlanchedAlmond">
<tr>
<td>Username</td>
<td>Password</td>
<td>First Name</td>
<td>Last Name</td>
<td>Money</td>
</tr>

<?php

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

<?php } else { echo("Invalid Admin Key"); } ?>

</td>
</tr>

</table>

</body>
</html>
