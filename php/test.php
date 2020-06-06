<?php
$nomeUtente = $_POST['username'];
$passwordUtente = $_POST['password'];
echo 'nome : ';
echo $nomeUtente;
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
        $sql = "SELECT id_rivenditore FROM rivenditori WHERE nome_rivenditore = '" . $nomeUtente . "' AND password_rivenditore = '" . $passwordUtente . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id = $row["id_rivenditore"];
          }

          echo "<h3>Login avvenuto con successo!</h3>" . "<br>";
          echo "Benvenuto $nomeUtente" . "<br>";
          echo '<a href="http://localhost/monopattino/php/inserisci.php?id=' . $id . '"><button type="button" class="btn btn-success btn-lg btn-block">Inserisci</button></a><br>';
        } else {
          echo "<h3>Nada Username o password non corretta.</h3>" . "<br>";
          echo "<br><a href='http://localhost/monopattino/html/index.html'><button type='button' class='btn btn-warning'>Riprova</button></a>";
        }
?>