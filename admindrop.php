<?php

$connection = @mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$id = $_POST['id'];

$key = $_POST['key'];

$result = mysql_query("SELECT * FROM ScubaCourse WHERE classID = " . $id);

$flag = mysql_num_rows($result);

?>

<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php

if (strcmp($key,"bistriceanu") == 0 || strcmp($key,"Bistriceanu") == 0) {

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
