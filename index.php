<html>
<head>
<title>Garden List</title>
</head>
<body>
<?php
//define DB connection details
$DBuser = "root";
$DBpassword = "";

//try-catch the connection
//display current users with garden space
//use include file?
try{
    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "You are connected!<br><br>";
    echo "Users with garden space.<br><br>";
    //$qResult = $connection->query("SELECT * FROM users"); //sql query
    $qResult = $connection->query("SELECT  gardens.garden_id, users.first_name,users.last_name FROM gardens INNER JOIN users ON gardens.user_id=users.user_id");
    
    //each row result retured as '$row'
    // //the 'key' for each value is the column name from the SQL table
    foreach ($qResult as $row) {
         echo $row['garden_id'] . " " . $row['first_name'] . $row['last_name'] . '<br>';
    }
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}
?>

<br>

<?php
//define DB connection details
$DBuser = "root";
$DBpassword = "";


//display current users
try{
    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "\/ All users \/<br><br>";
    $qResult = $connection->query("SELECT users.first_name,users.last_name FROM users");
    foreach ($qResult as $row) {
         echo $row['first_name'] . " " . $row['last_name'] . '<br>';
    }
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}
?>

<a href="add_user.php">Add User</a>


</body>
</html>