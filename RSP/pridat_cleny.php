<?php
$skupina = (isset($_POST['skupina'])) ? $_POST['skupina'] : '';
echo "<span class=\"skupina\">"."$skupina"."</span><br><br>";
?>
  <form  style="line-height: 20px" method="post" action="zpracuj_pridat_cleny.php" enctype="multipart/form-data">
    <span>Username: </span>
      <span><input type="text" name="userName" size="20" maxlength="20"></span><br>
    <span>Password: </span><br>
      <span><input type="password" name="pass" size="20" maxlength="20"></span><br>
    <input type="submit" value="Potvrdit">
    <input type=hidden value= <?php echo($skupina); ?> name="skupina" >
  </form>

