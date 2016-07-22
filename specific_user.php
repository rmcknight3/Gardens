<?php
//specific user
//take link from 'user_update' to fill in a form

$DBuser = "root";
$DBpassword = "";

$link_id = $_GET['link_id'];

echo "Link ID = " . $link_id . "<br>";


try{
	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//show user of clicked link
		$qresult = $connection->query("SELECT * FROM users WHERE user_id=$link_id");
		foreach ($qresult as $row){
			echo $row['user_id'] . $row['first_name'] . $row['last_name'] . "<br><br>";
		}
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}

//select garden to assign to this user
try{
	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Select available space to ADD to this user: "; 
	$garden_search=$connection->query('SELECT garden_id from gardens WHERE user_id IS NULL');
		foreach ($garden_search as $row){
			echo "<a href='add_confirm.php?add_this_garden=" . $row['garden_id'] . "&to_this_user=" . $link_id . "'>" . $row['garden_id'] . "</a>   ";
		}


}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}
echo "<br>";
?>



<?php
//remove space from the user
echo "Select space to REMOVE from this user: ";
try{
	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//show user of clicked link
		$userResult = $connection->query("SELECT garden_id FROM gardens WHERE user_id=$link_id");
		foreach ($userResult as $row){
			echo $row['garden_id'] . "   ";
		}
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}









