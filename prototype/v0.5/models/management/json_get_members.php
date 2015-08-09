<?php

include "../DB_CN.php";

$arr = [];

$irged = new db_cn\Table("irged_aan");
$upload = new db_cn\Table("uploads");

foreach ($irged->select("*", "type = 'i'") as $irgen) {
  $img = $upload->selectFirst("path", "name like '"+$irgen['ner']+"%'")['path'];
  $ner = $irgen['ner'];
  array_push($arr, ["ner" => $ner, "img" => $img]);
}

echo json_encode($arr);
 ?>
