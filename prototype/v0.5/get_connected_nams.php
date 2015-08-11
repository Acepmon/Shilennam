<?php

include "models/DB_CN.php";

$name = $_POST['name'];

$db = new DB_CN\Connector();
$db->query("select * from hom_ho");
$result = $db->resultset();
$arr = [];
foreach ($result as $res) {
  if (strtolower($res['ner']) === strtolower($name)) {
    array_push($arr, $res);
  }
}

$json = [];
foreach ($arr as $ar) {
  $array = [];
  $array['id'] = "connected".$ar['id'];
  $array['name'] = $ar['xo_ner'];
  $array['href'] = "#uls_connections";
}
echo json_encode($json);

 ?>
