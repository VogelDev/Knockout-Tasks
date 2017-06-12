<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$id = $_SESSION['oId'];
$task = $_POST['task'];

// $stmt = $db_con->prepare("CALL addTask('$id', '$task')");
$stmt = $db_con->prepare("CALL addTask(:id, :task)");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':task', $task, PDO::PARAM_STR);
// $stmt->execute(array(':username' => $username);
$stmt->execute();
?>
