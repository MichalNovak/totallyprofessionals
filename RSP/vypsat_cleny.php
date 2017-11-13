<?php

$skupina = $_POST['skupina'];

include("db_open.php");
    if($skupina == "admin"){
      $dotaz = "SELECT id_user, userName FROM users WHERE id_group = 1" ;  
    } elseif($skupina == "autor"){
      $dotaz = "SELECT id_user, userName FROM users WHERE id_group = 2" ;
    }elseif($skupina == "recenzent"){
      $dotaz = "SELECT id_user, userName FROM users WHERE id_group = 3" ;
    }else{
      $dotaz = "SELECT id_user, userName FROM users WHERE id_group = 4" ;
    }

    $stmt = $spojeni->prepare($dotaz);
    $stmt->bindValue(':skupina', $skupina, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
    echo "<span class=\"skupina\">"."$skupina"."</span><br><br>";

    if($rows){
      ?>
      <table width=80% border="1" align=center>
        <tr> <?php if ($_SESSION['uz']==1){ ?> <?php } ?><th>Username</th>
          <?php if ($_SESSION['uz']==1){ ?> <th>Smazat</th><?php } ?>
        </tr>
    <?php
      foreach ($rows as $veta) {
    ?>
        <tr>
    <?php if ($_SESSION['uz']==1){ ?>
          
     <?php } ?>
          <td align="center">
            <?php echo $veta['userName']; ?>
          </td>
    <?php if ($_SESSION['uz']==1){ ?>
          <td align="center">
            <form  style="margin-top: 0px; margin-bottom: 0px" method="get" action="smazat_clena.php" >
              <input type="hidden"  style="border: 0"
                value=<?php echo($veta['id_user']); ?> name="cislo" size="5" readonly="true" >
              <input type="image" src="obrazky/totrash.gif" width=25 height=25 value="submit">
            </form>
          </td>
     <?php } ?>
        </tr>

     <?php

      }
    ?> </table> <?php
    }
    else{
      echo "Nenalezeni žádní uživatelé";
    }
    ?><br><p align="center"><a HREF="hlavni.php">Hlavní stránka</a></p>


