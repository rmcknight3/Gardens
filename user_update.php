<!-- update placeholder -->
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
		//links to same page but with different variable
		$qresult = $connection->query("SELECT * FROM users");
		foreach ($qresult as $row){
			echo "<a href='specific_user.php?link_id=" . $row['user_id'] . "'>"  . $row['user_id'] . $row['first_name'] . $row['last_name'] . "</a><br>";
		}
		echo "<br><br>";

		$qresult = $connection->query("SELECT * FROM users");
		foreach ($qresult as $row){
			echo $row['user_id'] . $row['first_name'] . $row['last_name'] . "<br>";
		}
		echo "<br><br>";

		echo "new line<br>";

}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}
?>

<!-- <h1 style="display:none;">Elements Here!</h1> -->
<?php
// echo "<form style='display:none;'>";
echo	"<label id='selected_uid_label'>Field Label:</label>";
echo	"<input type='text' id='selected_uid' name='selected_uid'></input>";
echo"</form>";

echo"<script>";
echo	"function fillInTheBlank(){";
echo		"document.getElementById('selected_uid').value='' ";
echo	"}";
echo"</script>";

?>
















