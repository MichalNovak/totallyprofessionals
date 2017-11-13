<?php
include ("format.php");

  $jmeno = '%'.$_GET['jmeno'].'%';   ?>
 <html>
<br><br><br>
  <body bgproperties="fixed">
  <div class="obr1">
    <br><br><br><?php
  include("db_open.php");
    $dotaz = "SELECT userName FROM users WHERE userName LIKE :meno" ;
    $stmt = $spojeni->prepare($dotaz);
    $stmt->bindValue(':meno', $jmeno, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
    if($rows){
      ?><div class="vypis"><?php
      foreach ($rows as $row){
        echo ( $row['userName']."<br>");
      }
     ?></div><?php
    }
    else{
      echo "<div class=vypis><br><br><br><br><br>"."uživatel neexistuje"."</div><br>";

    }
?>    <br>
<a  HREF="hlavni.php"><div class="vypis">Hlavní stránka</div></a>
</div></body></html>
