<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once 'dbconfig.php';

  session_start();
  $uName = $_POST['name'];
  $options = [
      'cost' => 12,
  ];
  $pWord password_hash($_POST['pwd'], PASSWORD_BCRYPT, $options)."\n";
  $qry = "CALL addUser($uName, $pWord)";
  $res = $db_con->query($qry);

?>
