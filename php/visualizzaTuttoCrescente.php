<?php
$id = $_GET['id'];
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
    <?php
                $sql = "SELECT * FROM monopattini ORDER BY prezzo_monopattino";
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
    </tr>
  </thead>
   <tbody>';
                        while ($row = $result->fetch_assoc()) {
                            echo '
       <tr>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["id_monopattino"] . '</td>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["marca_monopattino"] . '</td>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["modello_monopattino"] . '</td>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["watt_monopattino"] . '</td>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["alimentazione_monopattino"] . '</td>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["batteria_monopattino"] . '</td>
        <td class="testoTabella" style="vertical-align:middle";>' . $row["prezzo_monopattino"] . '</td>
        <td><img class="fotoTabella"src="' . $row["img_monopattino"] . '"></td>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "La tabella è vuota.";
                    }
                $conn->close();
                ?>
</body>

</html>