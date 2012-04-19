<?php

$connection = @mysql_connect("omega.cs.iit.edu", "nmoutrey", "nmou123"); 

mysql_select_db("nmdb");

$name = $_POST['name'];
$description = $_POST['description'];
$location = $_POST['location'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$price = $_POST['price'];
$capacity = $_POST['capacity'];

$key = $_POST['key'];

?>

<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<?php

if (strcmp($key,"bistriceanu") == 0 || strcmp($key,"Bistriceanu") == 0) {

$success = mysql_query("Insert into ScubaCourse (name, location, description, day, month, year, capacity, price) values ('" . $name . "','" . $location . "','" . $description . "'," . $day . "," . $month . "," . $year . "," . $capacity . "," . $price . ")");

if ($success) {
echo("<p>Class added.</p>");
} else { echo("<p>Something went wrong somewhere.</p>"); }

} else { echo("Invalid Admin Key"); } ?>

</td>
</tr>

</table>

</body>
</html>
