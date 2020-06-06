<?php
$id = $_GET['id'];
$marca = $_POST['marca'];
$modello = $_POST['modello'];
$potenza = $_POST['potenza'];
$alimentazione = $_POST['alimentazione'];
$prezzo = $_POST['prezzo'];
$img = $_POST['img'];
$batteria = $_POST['batteria'];

echo 'marca: ' . $marca . '<br>';
echo 'modello: ' . $modello . '<br>';
echo 'potenza: ' . $potenza . '<br>';
echo 'alimentazione: ' . $alimentazione . '<br>';
echo 'batteria: ' . $batteria . '<br>';
echo 'prezzo: ' . $prezzo . '<br>';
echo 'img: ' . $img . '<br>';
echo 'id: ' . $id . '<br>';

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
$prova = 'aaa';
$sql = "UPDATE `monopattini`
     SET `modello_monopattino` = '" . $modello . "',
     `marca_monopattino` = '" . $marca . "',
     `watt_monopattino` = '" . $potenza . "',
     `alimentazione_monopattino` = '" . $alimentazione . "',
     `batteria_monopattino` = '" . $batteria . "',
     `prezzo_monopattino` = '" . $prezzo . "',
     `img_monopattino` = '" . $img . "'
     WHERE `monopattini`.`id_monopattino` = '" . $id . "'";
if ($conn->query($sql) === TRUE) {
  echo "Modificato";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
