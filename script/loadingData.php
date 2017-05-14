<?php
$servername = "localhost";
$username = "pw";
$password = "pass";
$dbname = "pomiary";

$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT DataPomiaru, Temperatura, Cisnienie, Wilgotnosc FROM POMIARY ORDER BY DataPomiaru DESC LIMIT 1";
$result = $conn->query($sql);

if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		echo 
			"<h2>POMIARY</h2> <h1 id='data'>" .
				"<span id='date'>Data Pomiaru: " . $row["DataPomiaru"]. "</span><br /> " .
				"<span id='temp'>Temperatura: " . $row["Temperatura"]. "</span><br />" .
				"<span id='pressure'>Cisnienie: " . $row["Cisnienie"]. "</span><br />" .
				"<span id='humidity'>Wilgotnosc: ". $row["Wilgotnosc"]. " </span><br />"
} else{
	echo "0 results";
}

$conn->close();
?>