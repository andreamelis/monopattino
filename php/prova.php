<?php
    $username = $_GET['username'];
    echo $username;
    echo 'ciao';
    if($_GET['menu'] == 2)
    header("location: http://localhost/monopattino/php/login.php");
    else if($_GET['menu'] == 3)
    header("location: http://localhost/monopattino/html/ariaRiservata.html");
    else if($_GET['menu'] == 4)
    header("location: http://localhost/monopattino/php/test.php");
