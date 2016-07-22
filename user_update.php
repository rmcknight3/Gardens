<!-- update placeholder -->
<!-- make this the new home page -->
<h1>Select user to update</h1>
<?php
$DBuser = "root";
$DBpassword = "";
?>

<br>

<?php
try{
	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//show all users
		//links to same page but with different value for link_id
		$qresult = $connection->query("SELECT * FROM users");
		foreach ($qresult as $row){
			echo "<a href='specific_user.php?link_id=" . $row['user_id'] . "'>"  . $row['user_id'] . $row['first_name'] . $row['last_name'] . "</a><br>";
		}
		echo "<br><br>";

		// $qresult = $connection->query("SELECT * FROM users");
		// foreach ($qresult as $row){
		// 	echo $row['user_id'] . $row['first_name'] . $row['last_name'] . "<br>";
		// }
		// echo "<br><br>";

		// echo "new line<br>";

}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}
?>

<p>Add new user</p>
<form name="form1" method='post' action='user_added.php'>
    <label id='f_name_label'>First Name: </label>
    <input id='f_name' type='text' name='f_name'></input>

    <label id='l_name_label'>Last Name: </label>
    <input id='l_name' type='text' name='l_name'></input>

    <input id='submitButton' type="button" value="ENTER" onclick="formCheck()"/>
</form>

<a href="user_update.php">User Update</a>


<script type="text/javascript">
    function formCheck(){
        fNameField = document.forms["form1"]["f_name"].value;
        lNameField = document.forms["form1"]["l_name"].value;
        if (fNameField == "" || lNameField=="") {
            alert("You need a first and last name!");
            document.getElementById("f_name").value="Stuff Goes Here";
            document.getElementById("l_name").value="and here";
        }else{
            alert(fNameField + " " + lNameField + " added to users.");
            document.forms['form1'].submit();
        }
    }
</script>

<!-- <h1 style="display:none;">Elements Here!</h1> -->
<?php
// echo "<form style='display:none;'>";
// echo	"<label id='selected_uid_label'>Field Label:</label>";
// echo	"<input type='text' id='selected_uid' name='selected_uid'></input>";
// echo"</form>";

// echo"<script>";
// echo	"function fillInTheBlank(){";
// echo		"document.getElementById('selected_uid').value='' ";
// echo	"}";
// echo"</script>";

?>
















