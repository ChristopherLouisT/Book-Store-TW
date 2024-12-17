<?php
session_start();
include "db_conn.php";

$idbook = $_POST['idbook']; 
$iduser = $_SESSION['user_id']; 

$stmt = $conn->prepare("INSERT INTO buybook VALUES (0, now(), ?, ?)");
$stmt->execute([$iduser, $idbook]);
echo "Buku sukses dibeli!";     
?>