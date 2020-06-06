<?php
$id = $_GET['id'];
$nomeUtente = $_GET['nomeUtente'];
$passwordUtente = $_GET['passwordUtente'];

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://localhost/monopattino/js/script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="http://localhost/monopattino/css/stile.css">
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
      <div id="sceltaElimina" style="text-align: center">
        <h2>Sei sicuro di volerlo eliminare?</h2>
        <?php
        echo "<a href='http://localhost/monopattino/html/index.html'><button type='button' class='btn btn-warning'>Torna indietro</button></a><br>";
        echo "<form action='http://localhost/monopattino/php/delete.php?id=$id' method='POST'>";
        ?>
        <br>
        <button type="submit" class="btn btn-danger" name="delete">elimina</button>
      </div>
      </form>
</body>

</html>
<?php
$conn->close();
?>