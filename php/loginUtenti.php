<?php
$nomeUtente = $_POST['username'];
$passwordUtente = $_POST['password'];

$servername = "localhost";
$username = "utente";
$password = "utente";
$dbname = "monopattino";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://localhost/monopattino/css/stile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://localhost/monopattino/js/script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<body>
<div class="jumbotron text-center text-white bg-primary titolo">
    <h1>Monopattiniamo.it</h1>
    <h5>Il sito dove troverai i migliori monopattini ai prezzi più bassi.</h5>
    <nav class="navbar navbar-expand-sm bg-success navbar-secondary justify-content-center">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="ancora" style="color: white;" href="http://localhost/monopattino/html/index.html" class="nav-link menu" id="1">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu" style="cursor: pointer;" id="logUtente">Login Utente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu" style="cursor: pointer;" id="ariaRiservata">Aria riservata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu" style="cursor: pointer;" id="contatti">Contatti</a>
        </li>
      </ul>
    </nav>
  </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <?php
                $sql = "SELECT * FROM utenti WHERE nome_utente = '" . $nomeUtente . "' AND password_utente = '" . $passwordUtente . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id_utente"];
                    }
                    echo "<h3>Login avvenuto con successo!</h3>" . "<br>";
                    echo "Benvenuto $nomeUtente" . "<br>";
                    echo '<a href="http://localhost/monopattino/php/visualizzaTutto.php?id=' . $id . '"><button type="button" class="btn btn-success btn-lg btn-block">Visualizza tutto</button></a><br>';
                    echo '<a href="http://localhost/monopattino/php/visualizzaTuttoCrescente.php?id=' . $id . '"><button type="button" class="btn btn-success btn-lg btn-block">Visualizza tutto in ordine di prezzo crescente</button></a><br>';

                } else {
                    echo "<h3>Username o password non corretta.</h3>" . "<br>";
                    echo "<br><a href='http://localhost/monopattino/html/index.html'><button type='button' class='btn btn-warning'>Riprova</button></a>";
                }
                $conn->close();
                ?>
</body>

</html>