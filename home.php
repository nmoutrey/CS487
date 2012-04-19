<?php session_start(); ?>

<html>
<title>Scuba School Home Page</title>
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
<p>Welcome to the Scuba School Website.</p></br>
<p>This is our homepage. Along the top of the page are links that you can use to traverse our website.</p>
<p>Only a small subset of our services are availble to guests. Please log in to access the entirety of the site.</p>
</td>
</tr>

<tr valign="bottom">
<td style="background-color:#80a0ff;text-align:center;" height=20px>
Nicholas Moutrey - CS 487 - IIT</td>
</tr>
</table>

</body>
</html>
