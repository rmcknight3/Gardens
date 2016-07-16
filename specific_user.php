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
			echo $row['user_id'] . $row['first_name'] . $row['last_name'] . "<br>";
		}
}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}

//select garden to assign to this user
try{
	$connection = new PDO('mysql:host=localhost;dbname=test', $DBuser, $DBpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




}catch(PDOException $e){
    echo "There was a connection error: " . $e->getMessage() . "<br>";
}





// echo "<select id='free_gardens'>";
// echo "</select>";

// echo "<script>";
// echo 	"window.onload=function(){";
// echo 		"var free_gardens = document.getElementById('free_gardens')";
// echo 		"var options = ['g1','g2','g3']";
// echo    "for (var i = 0; i < options.length; i++) {";
// echo        "var opt = options[i]";
// echo        "var el = document.createElement('option')";
// echo        "el.textContent = opt";
// echo        "el.value = opt";
// echo        "select.appendChild(el)";
// echo    "}";
// echo 	"}";
// echo "</script>";
?>
<form id='form2' method='POST' action='user_updated.php'>
    
    Select <select id = "selectList" name='selectList'></select>
    
    <input id='textbox1' name='textbox1' type='textbox'></input>

    <input id='theButton' name='theButton' type='button' value='ENTER' onclick='submit()'/>
</form>


<!-- insert  option for every available garden space-->
<script>
window.onload = function(){
    var select = document.getElementById("selectList");
    var options = [1,2,3,4,5,6];
    for (var i = 0; i < options.length; i++) {
        var opt = options[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        select.appendChild(el);
    }
}

function submit(){
	document.forms['form2'].submit();
}
</script>












