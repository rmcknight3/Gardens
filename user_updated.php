<?php
// user updated

$textboxValue = $_POST['textbox1'];
$selectValue = $_POST['selectList'];

$DBuser = "root";
$DBpassword = "";



// variable retrieval test
echo $textboxValue;
echo $selectValue;

try{
	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "YES!";
	

}
catch(PDOException $error){
	echo "nope!";
}
 ?>