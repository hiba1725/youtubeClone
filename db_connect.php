<?php

session_start();

define('DB_HOST','localhost'); // Host name
define('DB_USER','root'); // db user name
define('DB_PASS',''); // db user password=
define('DB_NAME','ourtube'); // db name
define('DB_PORT','3307'); // db port #

define("BASE_URL", "http://localhost/youtubeClone/");

// Establish database connection.

function getDB() {
    try {
    
        $dbConnection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT, DB_USER, DB_PASS);
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    
    } catch (PDOException $e) {
    
        exit("Error: " . $e->getMessage());
    
    }
}

?>