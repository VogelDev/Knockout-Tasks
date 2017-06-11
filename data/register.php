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
  $pWord = password_hash($_POST['pwd'], PASSWORD_BCRYPT, $options);

  $qry = "SELECT user_name FROM ko_task_users WHERE user_name='".$uName."'";
  $res = $db_con->query($qry);
  $num_row = $res->rowCount();
  $row = $res->fetch(PDO::FETCH_ASSOC);
  $response = new stdClass();
  if( $num_row == 1 ) {
  	$response->error = TRUE;
    $response->msg = "Username taken";
    echo json_encode($response);
  }
  else {
    $qry = "CALL addUser('$uName', '$pWord')";
    $res = $db_con->query($qry);
  	$response->error = TRUE;
    $response->msg = "Username Registered";
    echo json_encode($response);
  }

?>
