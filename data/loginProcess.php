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
$uName = 'user';
$pWord = 'password';
$qry = "SELECT user_id, user_name FROM ko_task_users WHERE user_name='".$uName."' AND user_password='".$pWord."'";
$res = $db_con->query($qry);
$num_row = $res->rowCount();
$row=$res->fetch(PDO::FETCH_ASSOC);
if( $num_row == 1 ) {
	echo 'true';
  	$_SESSION['uName'] = $row['username'];
  	$_SESSION['oId'] = $row['orgid'];
  	$_SESSION['auth'] = $row['oauth'];
	}
else {
	echo 'false';
}

?>
