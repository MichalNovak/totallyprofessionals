<?php
session_start();
include ("format.php");
?>
<html>
<br><br><br>
  <body bgproperties="fixed">
  <div class="obr1">
    <br><br><br>
<?php
  $co_stim = (isset($_POST['co_stim'])) ? $_POST['co_stim'] : '';
  switch ($co_stim) {
    case "vypsat cleny":
      include"vypsat_cleny.php";
      break;
    case "pridat cleny":
      include"pridat_cleny.php";
      break;
    default:
      echo "nic nevybráno !!!";
      ?><br><a class=odkaz HREF="hlavni.php">Znovu</a><?php
  }
?>  </div></body><?php include("podpis.php"); ?></html>
