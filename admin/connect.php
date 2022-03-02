<?php

$dsn = "mysql:host=localhost;dbname=olx";
$db_username = "root";
$db_password = "";


try {

    $conn = new PDO($dsn, $db_username, $db_password);

} catch (PDOException $e) {

    echo "<h2>Failed connect to database</h2> $e";

}
