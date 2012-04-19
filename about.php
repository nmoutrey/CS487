<?php session_start(); ?>

<html>
<title>About Scuba School</title>
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
<p>Scuba School has been providing quality scuba diving instruction and aid since three days ago.</p>
<p>It is our mission to ensure that no one who is interested in scuba diving is denied the opportunity to give us money.</p>
<p>For more information on our business, call or mail us using the below information.</p></br>
<p>999 Fake Street</p>
<p>Winnetka, Illinois, 60692</p>
<p>1-800-NOT-REAL</p>
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
