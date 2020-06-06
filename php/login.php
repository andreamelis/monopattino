<?php
$nomeUtente = $_POST['username'];
$passwordUtente = $_POST['password'];

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://localhost/monopattino/css/stile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="http://localhost/monopattino/js/script.js"></script>
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
          echo "<h3>Username o password non corretta.</h3>" . "<br>";
          echo "<br><a href='http://localhost/monopattino/html/index.html'><button type='button' class='btn btn-warning'>Riprova</button></a>";
        }
        ?>

        <?
$sql = "SELECT * FROM monopattini WHERE id_rivenditore='".$id."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '
  <h2>Elenco di tutti i tuoi monopattini in vendita</h2>
  <table class="table table-bordered table-sm">
<thead>
    <tr>
      <th>Id</th>
      <th>Marca</th>
      <th>Modello</th>
      <th>Watt</th>
      <th>Alimentazione</th>
      <th>Durata batteria</th>
      <th>Prezzo</th>
      <th>Foto</th>
      <th>Modifica</th>
      <th>Elimina</th>
    </tr>
  </thead>
   <tbody>';
  while($row = $result->fetch_assoc()) {
  echo '
  <tr>
        <td class="testoTabella" style=vertical-align:middle;>'.$row["id_monopattino"].'</td>
        <td class="testoTabella" style=vertical-align:middle;>'.$row["marca_monopattino"].'</td>
        <td class="testoTabella" style=vertical-align:middle;>'.$row["modello_monopattino"].'</td>
        <td class="testoTabella" style=vertical-align:middle;>'.$row["watt_monopattino"].'</td>
        <td class="testoTabella"style=vertical-align:middle;>'.$row["alimentazione_monopattino"].'</td>
        <td class="testoTabella" style=vertical-align:middle;>'.$row["batteria_monopattino"].'</td>
        <td class="testoTabella" style=vertical-align:middle;>'.$row["prezzo_monopattino"].'</td>
        <td><img class="fotoTabella"src="'.$row["img_monopattino"].'"></td>
        <td class="testoTabella" style=vertical-align:middle;>
        <a href="http://localhost/monopattino/php/modifica.php?id='.$row["id_monopattino"].'&marca='.$row["marca_monopattino"].'
        &modello_monopattino='.$row["modello_monopattino"].'&watt_monopattino='.$row["watt_monopattino"].'
        &alimentazione_monopattino='.$row["alimentazione_monopattino"].'&batteria_monopattino='.$row["batteria_monopattino"].'
        &prezzo_monopattino='.$row["prezzo_monopattino"].'&img_monopattino='.$row["img_monopattino"].'">Modifica</a></td>
        <td class="testoTabella" style=vertical-align:middle;>
        <a href="http://localhost/monopattino/php/elimina.php?nomeUtente='."$nomeUtente".
        '&id='.$row["id_monopattino"].
        '&passwordUtente='."$passwordUtente".
        '">Elimina</a></td>
        ';
   }
   echo '
       </tbody>
     </table>';
} else {
  echo "La tabella è vuota.";
}
?>
</body>

</html>
<?php
$conn->close();
?>