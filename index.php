<!DOCTYPE html>
<html>
	<head>
		<title>Pomiary</title>
		<link rel="stylesheet" href="css/user.css" />
	</head>
	<body id="body">
		
		<h2>POMIARY</h2>
		
		<h1 id="data">
			<span id="date">Data Pomiaru: <span id="dateInput"></span></span><br />
			<span id="date">Temperatura: <span id="temperatureInput"></span></span><br />
			<span id="date">Cisnienie: <span id="pressureInput"></span></span><br />
			<span id="date">Wilgotnosc: <span id="humidityInput"></span></span><br />
		</h1>
		
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
		echo "Data: " . $row["DataPomiaru"]. " - temp: " . $row["Temperatura"]. " - cisnienie " . $row["Cisnienie"]. " -wilgotnosc " . $row["Wilgotnosc"]. 
			"<br/ >";
		}
} else{
	echo "0 results";
}

$conn->close();
?>
		
	</body>
</html>