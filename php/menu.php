<?php
    if($_GET['menu'] == 'logUtente')
    header("location: http://localhost/monopattino/html/loginClienti.html");
    else if($_GET['menu'] == 'ariaRiservata')
    header("location: http://localhost/monopattino/html/ariaRiservata.html");
    else if($_GET['menu'] == 'contatti')
    header("location: http://localhost/monopattino/html/contatti.html");
    else if($_GET['menu'] == 'ResgistraRivenditore')
    header("location: http://localhost/monopattino/html/registrazione.html");
    else if($_GET['menu'] == 'ResgistraUtente')
    header("location: http://localhost/monopattino/html/registratiUtente.html");
    else if($_GET['menu'] == 1)
    header("location: http://localhost/monopattino/html/registratiUtente.html");
?>