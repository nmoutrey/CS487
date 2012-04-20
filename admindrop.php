<?php

$connection = @mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$id = $_POST['id'];

$key = $_POST['key'];

$flag1 = false;
$flag2 = false;

if ($id == "" || $key == "") { $flag1 = true; }
if (!ctype_digit($id)) {$flag2 = true; }

$result = @mysql_query("SELECT * FROM ScubaCourse WHERE classID = " . $id);

$flag = @mysql_num_rows($result);
?>

<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php if ($flag1) { ?>
<p>This page requires input. Either you attempted to access this page directly, or you left one or more input fields blank.</p>
<?php } else if ($flag2) { ?>
<p>The class ID input must be a number.<p>
<?php } else if (strcmp($key,"bistriceanu") == 0 || strcmp($key,"Bistriceanu") == 0) {

if (!$flag) { echo("This class ID does not correspond to a currently existing course."); } else {

mysql_query("DELETE FROM TakesCourse WHERE classID =" . $id);
mysql_query("DELETE FROM ScubaCourse WHERE classID =" . $id);

echo("Course deleted.");

} } else { echo("Invalid Admin Key"); } ?>

</td>
</tr>

</table>

</body>
</html>
