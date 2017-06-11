<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$id = $_SESSION['oId'];
$task = $_POST['task'];

$qry = "CALL addTask('$id', '$task')";
$res = $db_con->query($qry);

?>
