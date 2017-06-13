<?php
var_dump($_SESSION);

/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once 'dbconfig.php';

$id = 5;

$sth = $db_con->prepare("CALL getCategories(:id)");
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();

class Category{
  public $name;
  public $tasks;
  public $id;
}

$test = [];

$arr = array();
$results = $sth->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
foreach ($results as $key => $value) {
  // echo "$key <br/>";
  // var_dump($value);
  // echo "<br/>";
  $obj = new Category();
  $obj->tasks = $value;
  $test = $value[0]["CATEGORY"];
  echo $value[0]["CATEGORY"] . "<br/>";
  $obj->name = $key;
  $obj->id = $value[0]["CATEGORY"];
  array_push($arr, $obj);
}
//var_dump(array_values($arr));
echo json_encode($arr);
?>
