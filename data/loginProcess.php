<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$uName = $_POST['name'];
// $options = [
//     'cost' => 12,
// ];
//$pWord = password_hash($_POST['pwd'], PASSWORD_BCRYPT, $options);
$pWord = $_POST['pwd'];
$qry = "SELECT user_id, user_name, user_password FROM ko_task_users WHERE user_name='".$uName."'";
$res = $db_con->query($qry);
$num_row = $res->rowCount();
$row = $res->fetch(PDO::FETCH_ASSOC);
$response = new stdClass();
if( $num_row == 1 ) {
    if(password_verify ($pWord, $row['user_password'])){
    	$_SESSION['uName'] = $row['user_name'];
    	$_SESSION['oId'] = $row['user_id'];
    	// $_SESSION['auth'] = $row['oauth'];
      $response->error = FALSE;
      $response->msg = "Logged In";
      echo json_encode($response);
    }else{
      $response->error = TRUE;
      $response->msg = "Incorrect Username or Password";
      $response->pwd = $row['user_password'];
      echo json_encode($response);
    }
}else {
  $response->error = TRUE;
  $response->msg = "Username not found";
  echo json_encode($response);
}

?>
