<?php

include "../DB_CN.php";

$arr = [];

if (!empty($_POST['name']) && !empty($_POST['img'])) {
  $db = new db_cn\Connector();
  $db->query("insert into gishuun (name, upload_pic) values(:name, :upload_pic);");
  $db->bind(":name", $_POST['name']);
  $db->bind(":upload_pic", $_POST['img']);
  $db->execute();
  $arr['name'] = $_POST['name'];
  $arr['img'] = $_POST['img'];
}

echo json_encode($arr);


 ?>
