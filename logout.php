<?php
session_start();
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

<p>You have been logged out. You can return to our homepage <a href="home.php">Here</a></p>

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
