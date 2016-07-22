<?php
//specific user
//take link from 'user_update' to fill in a form

$DBuser = "root";
$DBpassword = "";

$add_this_garden = $_GET['add_this_garden'];
$to_this_user = $_GET['to_this_user'];


echo "Confirm <br>";

echo "Garden ID=" . $add_this_garden;
echo "User ID=" . $to_this_user;
echo"<br>";

$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $garden = $connection->query("SELECT first_name FROM users WHERE user_id=" . $to_this_user);

$userFirst = $connection->query("SELECT first_name FROM users WHERE user_id=" . $to_this_user);
$userLast = $connection->query("SELECT last_name FROM users WHERE user_id=" . $to_this_user);

// $link_id = $_GET['link_id'];
echo "Add garden " . $add_this_garden . " to ";
		foreach ($userFirst as $row){
			echo $row['first_name'] . " ";
		}
		foreach ($userLast as $row){
			echo $row['last_name'] . "?";
		}



// try{
// 	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
// 	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 		//show user of clicked link
// 		$qresult = $connection->query("SELECT * FROM users WHERE user_id=$link_id");
// 		foreach ($qresult as $row){
// 			echo $row['user_id'] . $row['first_name'] . $row['last_name'] . "<br>";
// 		}
// }catch(PDOException $e){
//     echo "There was a connection error: " . $e->getMessage() . "<br>";
// }













