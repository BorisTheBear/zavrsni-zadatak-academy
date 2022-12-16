<?php
    $servername = "127.0.0.1";
    $username = "vivify";
    $password = "vivify";
    $databaseName = "blog";

    try {
        $connection = new PDO("mysql:host=$servername; dbname=$databaseName", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>