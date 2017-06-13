<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$id = $_SESSION['oId'];
$name = $_POST['name'];

$query = "";

if(isset($_POST['category'])){
  $category = $_POST['category'];
  $query = "CALL changeCategory(:category, :name, :id)";
}else{
  $query = "CALL addCategory(:id, :name, :category)";
}

$stmt = $db_con->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':category', $category, PDO::PARAM_INT);
$stmt->execute();
?>
