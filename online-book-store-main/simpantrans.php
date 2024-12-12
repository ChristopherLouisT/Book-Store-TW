<?php
session_start();
include "db_conn.php";

$idbook = $_POST['idbook']; 
$iduser = 99; 

$stmt = $conn->prepare("select * from buybook where user_id = ? and book_id = ?");
$stmt->execute([$iduser, $idbook]);

if($stmt->rowCount() == 0) {
    $stmt = $conn->prepare("INSERT INTO buybook VALUES (0, now(), ?, ?)");
    $stmt->execute([$iduser, $idbook]);
    echo "sukses buy book";     
}

?>