<?php
session_start();
include ("format.php");
  if(!(isset($_SESSION['jm'])))
    { echo "<br><br><br><br><br>"."Nejste přihlášen!"."<br>";
    ?><A class=odkaz href="index.html" >Přihlásit se</A><BR><?php
    }
    else
{
  ?>
<html>

  <br><br><h2> RSP - Aplikace</h2><br>
  <body bgproperties="fixed">

    <div class="obr1">
    <br><br><br>
    <form  style="line-height: 30px" method="post" action="zpracuj_hlavni.php" enctype="multipart/form-data">
      <span>Vybrat roli:</span>
        <?php
        include("db_open.php");
        $dotaz = "SELECT * FROM groups" ;
          $stmt = $spojeni->prepare($dotaz);
          $stmt->execute();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
      <span ><select name="skupina" >
        <?php
        foreach ($rows as $veta)
        {
          echo "<option value=\"".$veta['nazev']."\"" ." >".$veta['nazev'] ."</ option>"."<br>";
        }
    ?></select></span><br>
      <input type="radio" value="vypsat cleny" id="a" name="co_stim" /><label for="a"> Zobrazit uživatele</></label>

      <br><?php
      if ($_SESSION['uz']==1){
        ?><input type="radio" value="pridat cleny" id="b" name="co_stim" /><label for="b"> Přidat uživatele</></label>
          <br>
        <?php
      }
    ?>
        <input type="submit" value="Potvrdit">
    </form>
    <form action="najdiUzivatele.php" method="get" enctype="multipart/form-data"><br>
    <h2> Hledat uživatele</h2>
       <span style="font-weight: 700; font-size: 15px;"> Username: </span>
      <span><input type="text" name="jmeno" size="20" maxlength="20"></span><br><br>
    <input type="submit" value="Hledat">

    </form>
    </div>

  </body>

      <a class="site-footer" HREF="odhlasit.php" title="ukončit práce s databázi">Odhlásit se </a><BR>  
      <?php } ?>   
</html>