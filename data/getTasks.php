<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'dbconfig.php';

session_start();
$id = $_SESSION['oId'];

$sth = $db_con->prepare("CALL getCategories(:id)");
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();

class Category{
  public $name;
  public $tasks;
  public $category;
}

$arr = array();
$results = $sth->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
foreach ($results as $key => $value) {
  $obj = new Category();
  if($value != null){
    $obj->tasks = $value;
  }else{
    $obj->tasks = array();
  }
  $obj->name = $key;
  $obj->category = $value[0]["CATEGORY"];
  array_push($arr, $obj);
}
//var_dump(array_values($arr));
echo json_encode(array_values($arr));

//echo json_encode($sth->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC));
?>
