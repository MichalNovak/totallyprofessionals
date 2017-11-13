<?php
session_start();
include ("format.php");

  $heslo = $_GET['heslo'];
  $jmeno = $_GET['jmeno'];

  include("db_open.php");
    $dotaz = "SELECT * FROM users WHERE userName=:meno" ;
    $stmt = $spojeni->prepare($dotaz);
    $stmt->bindValue(':meno', $jmeno, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rows){
      $heslo_db = $rows['pass'];
      $uz = $rows['id_group'];

      if( $heslo == $heslo_db){
        $_SESSION['jm'] = $jmeno;
        $_SESSION['uz'] = $uz;
        header('Location:hlavni.php');
      }
      else{
        echo "<br><br><br><br><br>"."špatné jmého nebo heslo"."<br>";
        ?><a  class=odkaz HREF="index.html">Nový pokus</a><?php
      }
    }
    else{
      echo "<br><br><br><br><br>"."Chybné jméno nebo heslo!"."<br>";
        ?><a  class=odkaz HREF="index.html">Vrátit se</a><?php
    }
?>
