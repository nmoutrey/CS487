<?php

$connection = mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$cusername = $_POST['username'];
$cpassword = $_POST['password'];
$cfirsname = $_POST['firstname'];
$clastname = $_POST['lastname'];

$result = mysql_query("SELECT * FROM ScubaUser WHERE username=\"" . $cusername . "\"");

$row = mysql_fetch_array($result);

$flag = mysql_num_rows($result);

?>

<html>
<?php if ($flag == 0) { ?>
<title>Account Creation Successful</title>
<?php } else { ?>
<title>Account Creation Failed</title>
<?php } ?>

<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>
<tr> <td style="background-color:#80a0ff;" height=20px>

<p style="text-align:center;"><a href="login.php">Login Page</a> - <a href="list.php">View Available Classes</a> - <a href="about.php">About Us</a></p>

</td>
</tr>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php
if ($flag == 0)
{
$query = "INSERT INTO ScubaUser VALUES('$cusername','$cpassword','$cfirsname','$clastname',0);";
mysql_query($query);
?>

<p>Your account is now created. You can proceed to the <a href="login.php">Login Page</a> to begin using it.</p></br>

<?php } else { ?>
<p>That username is taken. Please go back and <a href="register.php">Try Again</a></p>
<?php } ?>

</td>
</tr>

<tr valign="bottom">
<td style="background-color:#80a0ff; text-align:center;" height=20px>
<a href="home.php">Return to Home</a><br>
Nicholas Moutrey - CS 487 - IIT</td>
</tr>
</table>

</body>
</html>
