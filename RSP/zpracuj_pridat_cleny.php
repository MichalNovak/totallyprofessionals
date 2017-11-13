<?php
$userName = (isset($_POST['userName'])) ? $_POST['userName'] : '';
$pass = (isset($_POST['pass'])) ? $_POST['pass'] : '';
$skupina = (isset($_POST['skupina'])) ? $_POST['skupina'] : '';
include("db_open.php");

$dotaz = "SELECT id_group FROM groups WHERE nazev=:skupina" ;
    $stmt = $spojeni->prepare($dotaz);
    $stmt->bindValue(':skupina', $skupina, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_group = $rows['id_group'];

    $dotaz = "INSERT INTO users (userName, pass, id_group ) VALUES (:userName, :pass, :id_group)";
    $stmt = $spojeni->prepare($dotaz);
    $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindValue(':id_group', $id_group, PDO::PARAM_STR);
    $stmt->execute();

    header("Location:hlavni.php");
?>
