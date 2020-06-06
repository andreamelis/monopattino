<?php
$nomeUtente = $GET['username'];
$passwordUtente = $_POST['password'];
$id = $_GET['id'];
$marca = $_GET['marca'];
$watt_monopattino = $_GET['watt_monopattino'];
$modello_monopattino = $_GET['modello_monopattino'];
$batteria_monopattino = $_GET['batteria_monopattino'];
$alimentazione_monopattino = $_GET['alimentazione_monopattino'];
$prezzo_monopattino = $_GET['prezzo_monopattino'];
$img_monopattino = $_GET['img_monopattino'];
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
  <div class="row">
    <div class="col-sm-12">
      <div class="container">
        <?php
        echo "<form action='http://localhost/monopattino/php/update.php?id=$id' method='POST'>";


        ?>
        <div class="form-group">
          <label>Marca</label>
          <input type="text" name="marca" class="form-control" value="<?php echo "$marca"; ?>">

          <label>Modello</label>
          <input type="text" name="modello" class="form-control" value="<?php echo "$modello_monopattino"; ?>">

          <label>Potenza</label>
          <input type="text" name="potenza" class="form-control" value="<?php echo "$watt_monopattino"; ?>">

          <label>Alimentazione</label>
          <input type="text" name="alimentazione" class="form-control" value="<?php echo "$alimentazione_monopattino"; ?>">

          <label>Autonomia</label>
          <input type="text" name="batteria" class="form-control" value="<?php echo "$batteria_monopattino"; ?>">
          <label>Prezzo</label>
          <input type="number" name="prezzo" class="form-control" value="<?php echo $prezzo_monopattino; ?>">
          <label>Foto</label>
          <input type="text" name="img" class="form-control" value="<?php echo $img_monopattino; ?>">
          <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div>
        </form>
      </div>