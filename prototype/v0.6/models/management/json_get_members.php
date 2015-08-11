<?php

include "../DB_CN.php";

$arr = [];

$gishuun = new db_cn\Table("gishuun");
$upload = new db_cn\Table("uploads");

foreach ($gishuun->select("*") as $gish) {
  $name = $gish['name'];
  $img = $upload->selectFirst("path", "id = ".$gish['upload_pic'])['path'];
  array_push($arr, ["ner" => $name, "img" => $img]);
}

echo json_encode($arr);
 ?>
