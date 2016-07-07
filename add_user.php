<!-- Add User -->
<?php
$DBuser = "root";
$DBpassword = "";
?>
<p>Add new user</p>
<form method='post' action='user_added.php'>
	<label id='f_name_label'>First Name: </label>
	<input id='f_name' type='text' name='f_name'></input>

	<label id='l_name_label'>Last Name: </label>
	<input id='l_name' type='text' name='l_name'></input>

	<input id='submitButton' type="submit" value="ENTER">
</form>


<br>
<a href='index.php'>Front page</a>








