<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$id = $_SESSION['oId'];

$qry = "CALL getTasks('$id')";
$res = $db_con->query($qry);
$result = $res->fetchAll();

echo json_encode($result);

?>
