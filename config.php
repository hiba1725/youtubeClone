<?php

    ob_start();

    date_default_timezone_get();

    try {

        $con = new PDO("mysql:dbname=OurTube;host=localhost;port=3307","root","");

        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

    } catch(PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }

?>