<?php
$id = $_GET['id'];
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
  <script type="text/javascript">
    $(document).ready(function() {
      $(".menu").click(function() {
        $(".container").load("http://localhost/monopattino/php/menu.php?menu=" + this.id);
      });
    });
  </script>

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

  <div class="container">
    <h2>Inserisci i dati del monopattino</h2>
    <?
$sql = "SELECT nome_marca_monoppatino FROM marche_monopattino";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '
    <b>Marca:</b>
  <form action="datiInseriti.php?id='.$id.'" method="POST">
    <select name="marca" class="custom-select mb-3">
      <option selected>Seleziona la marca</option>';
  while($row = $result->fetch_assoc()) {
  echo '
        <option value='.$row["nome_marca_monoppatino"].'>'.$row["nome_marca_monoppatino"].'</option>';
   }
   echo '
   </select>';
   echo '
   <b>Modello:</b>
   <input type="text" class="form-control"  placeholder="inserisci il modello" name="modello">
   <b>Potenza:</b>
   <input type="number" class="form-control"  placeholder="inserisci la potenza motore (in Watt)" name="potenza">
   <b>Alimentazione:</b>
   <select name="alimentazione" class="custom-select mb-3">
   <option selected>Seleziona l alimentazione</option>
   <option value=benzina>benzina</option>
  <option value=elettrico>elettrico</option>';
     echo '
     </select>
   <b>Autonomia:</b>
   <input type="number" class="form-control"  placeholder="inserisci la durata (in ore) della batteria" name="durata">
   <b>Prezzo:</b>
   <input type="number" class="form-control"  placeholder="inserisci il prezzo" name="prezzo">
   <b>Immagine:</b>
   <input type="text" class="form-control"  placeholder="inserisci la foto indirizzo web" name="img"> 
   ';
   echo '<div class="d-flex justify-content-center">
   <button  type="submit" class="btn btn-primary">Inserisci</button>
 </div>
 </form>';
} else {
  echo "La tabella è vuota.";
}
?>

</body>

</html>
<?php
$conn->close();
?>