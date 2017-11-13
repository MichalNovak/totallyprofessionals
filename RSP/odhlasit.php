<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php session_start();?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>

<?php

   session_unset();
   header("location: index.html", True);
?>
</html>