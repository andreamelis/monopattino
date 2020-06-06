<?php
$id = $_GET['id'];

$marca = $_POST['marca'];
$modello = $_POST['modello'];

$alimentazione = $_POST['alimentazione'];
$prezzo = $_POST['prezzo'];
$img = $_POST['img'];
$potenza = $_POST['potenza'];
$durata = $_POST['durata'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "monopattino";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO monopattini VALUES(0,'" . $id . "', '" . $modello . "',  '" . $marca . "', '" . $potenza . "',  '" . $alimentazione . "', '" . $durata . "',  '" . $prezzo . "',  '" . $img . "')";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>