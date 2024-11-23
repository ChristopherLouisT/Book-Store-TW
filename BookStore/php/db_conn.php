<?php

#Server
$sName = "localhost";

#User
$uNAme = "root";

#Password
$pass = "";

#Database
$db_name = "bookstore_db";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uNAme, $pass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection Failed : ". $e -> getMessage();
}