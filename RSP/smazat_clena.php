<?php
$cislo = $_GET['cislo'];
include("db_open.php");

$dotaz = "DELETE FROM users WHERE id_user=:cislo" ;
    $stmt = $spojeni->prepare($dotaz);
    $stmt->bindValue(':cislo', $cislo, PDO::PARAM_STR);
    $stmt->execute();


header("Location:hlavni.php")
?>
