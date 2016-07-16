<html>
<head>
<title>Garden List</title>
</head>
<body>

<?php
//define DB connection credientials
$DBuser = "root";
$DBpassword = "";

//try-catch the connection
//use include file?
try{
    $connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);//new PDO connection object
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<table>
    <caption>Garden Spaces With Users</caption>
    <tbody>
<?php
    $qResult = $connection->query("SELECT  gardens.garden_id, users.first_name,users.last_name FROM gardens INNER JOIN users ON gardens.user_id=users.user_id");
    echo "<tr>";
        echo "<th>Garden ID</th>";
        echo "<th>User First Name</th>";
        echo "<th>User First Last</th>";
    echo "</tr>";
    foreach ($qResult as $row) {
        echo "<tr>";
        echo "<td>" . $row['garden_id'] . "</td>" . "<td>" . $row['first_name'] . "</td>" . "<td>" . $row['last_name'] . "</td>";
        echo "</tr>";
    }
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}
?>
</tbody>
</table>

<br>

<table>
    <caption>All Users</caption>
    <tbody>
    <?php
    $qResult = $connection->query("SELECT users.first_name,users.last_name FROM users");
        echo "<tr><th>First Name</th><th>Last Name</th></tr>";
        foreach ($qResult as $row) {

            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>" . "<td>" . $row['last_name'] . "</td>";
            echo "</tr>";
        }

    ?>
    </tbody>
</table>

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
</body>
</html>