<?php
session_start();
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Knockout Task List</title>
  <script src="js/jquery-3.2.0.min.js"></script>
  <script src="js/knockout-3.4.2.min.js"></script>
  <script src="js/bootstrap-3.3.7.min.js"></script>
  <link href="css/bootstrap-3.3.7.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme-3.3.7.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <?php
    include("./includes/mainPageTest.php");
    include("./includes/signInForm.php");
  ?>
  <script src="js/scripts.js"></script>

  <?php
    if($_SESSION['oId']){
      echo "<script>$('#logindiv').hide();getTasks();$('#categories').show();</script>";
    }else{
      echo "<script>$('#categories').hide();</script>";
    }
  ?>

</body>

</html>
