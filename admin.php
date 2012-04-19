<html>
<title>Scuba School Admin Control Panel</title>
<body style="background-color:5e7edd;">

<table width="100%" height="100%" border=1px>

<tr valign="top">
<td style="background-color:#aaffaa;width:400px;text-align:top;">

<p>This is the admin control panel for Scuba School.</p>
<p>Only those with the Admin Key are able to make changes here.</p></br>

<p><b>View Users</b></p>
<p>If you would like to view a list of all site users, input the Admin Key below.</p>
<FORM ACTION="adminlist.php" METHOD=POST>
Admin Key: <INPUT TYPE=TEXT NAME="key"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM>
</br>
<p><b>View Course</b></p>
<p>If you would like to view a list of users in a specific course, input the Class ID and Admin Key below.</p>
<FORM ACTION="adminlist2.php" METHOD=POST>
Class ID: <INPUT TYPE=TEXT NAME="id"></br>
Admin Key: <INPUT TYPE=TEXT NAME="key"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM>
</br>
<p><b>Add Class</b></p>
<p>In order to add a new class, place the class information and Admin Key below.</p>
<FORM ACTION="adminadd.php" METHOD=POST>
Class Name: <INPUT TYPE=TEXT NAME="name"></br>
Class Description: <INPUT TYPE=TEXT NAME="description"></br>
Class Location: <INPUT TYPE=TEXT NAME="location"></br>
Class Date (MM/DD/YYYY): <INPUT TYPE=TEXT NAME="month" SIZE=2>/<INPUT TYPE=TEXT NAME="day" SIZE=2>/<INPUT TYPE=TEXT NAME="year" SIZE=2></br>
Class Capacity: <INPUT TYPE=TEXT NAME="capacity"></br>
Class Price: <INPUT TYPE=TEXT NAME="price"></br>
Admin Key: <INPUT TYPE=TEXT NAME="key"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM>
</br>
<p><b>Drop Class</b></p>
<p>In order to delete a class that has been held or cancelled, place the Class ID and the Admin Key below.</p>
<p><u>This action cannot be undone. A refund will not be issued.</u></p>
<FORM ACTION="admindrop.php" METHOD=POST>
Class ID: <INPUT TYPE=TEXT NAME="id"></br>
Admin Key: <INPUT TYPE=TEXT NAME="key"></br>
<INPUT TYPE=SUBMIT VALUE="Enter">
</FORM>

</td>
</tr>

</table>

</body>
</html>
