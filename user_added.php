<!-- Add User -->
<?php
$DBuser = "root";
$DBpassword = "";

$new_fname = $_POST['f_name']; //gets new user info from POST data (from add_user.php)
$new_lname = $_POST['l_name'];

echo "<br>";
echo $new_fname . ' ' .$new_lname .  " added to users.<br>";

try{
    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //the SQL INSERT
    // $qResult = $connection->query("INSERT INTO users (users.first_name, users.last_name) VALUES ('$new_fname', '$new_lname')");
    $connection->query("INSERT INTO users (users.first_name, users.last_name) VALUES ('$new_fname', '$new_lname')");

}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}

try{
    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 	//show the updated table
    $qResult = $connection->query("SELECT * FROM users");
    foreach ($qResult as $row) {
         echo $row['user_id'] . " " . $row['first_name'] . $row['last_name'] . '<br>';
    }
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}

?>

<br>
<a href='index.php'>Front page</a>