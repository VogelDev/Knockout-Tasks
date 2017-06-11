<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$id = $_SESSION['oId'];
$task_data = json_decode($_POST['task']);
$task = $task_data->ID;
$complete = $task_data->COMPLETED == 1 ? 0 : 1;

$qry = "CALL completeTask('$id', '$task', '$complete')";
$db_con->query($qry);

?>
