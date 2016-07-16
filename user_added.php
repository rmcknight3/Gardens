<!-- Add User -->
<?php
error_reporting(0);

$DBuser = "root";
$DBpassword = "";

$new_fname = $_POST['f_name']; //gets new user info from POST data (from add user form)
$new_lname = $_POST['l_name'];

if (is_null($new_fname) || is_null($new_lname)) {
	// $DBuser = "toot";
	// $DBpassword = "password";
	// $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
	echo "ERRORS<br>";
	echo "-You need values for first name and last name to add a new user.<br>";
	echo "-Or you tried to load/reload this page directly.<br>";
	echo "-Or you got here by accident<br>";
	echo "-New user NOT added.";
	echo "<br>";
}else{
	//the actual insert
	try{
	    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
	    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $connection->query("INSERT INTO users (users.first_name, users.last_name) VALUES ('$new_fname', '$new_lname')");

	}catch(PDOException $e){
	    echo "There was a connection error: " . $e->getMessage() . "<br>";
	}
	//shows the updated table
	try{
	    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
	    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
	    $qResult = $connection->query("SELECT * FROM users");
	    foreach ($qResult as $row) {
	         echo $row['user_id'] . " " . $row['first_name'] . $row['last_name'] . '<br>';
	    }
	}catch(PDOException $e){
	    echo "There was a connection error: " . $e->getMessage() . "<br>";
	}
}

?>

<br>
<a href='index.php'>Front page</a>