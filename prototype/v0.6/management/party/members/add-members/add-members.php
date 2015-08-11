<?php

include "../../../../models/DB_CN.php";
include "../../../../controllers/helper-functions.php";

$arr = [];

if (!empty($_POST['gis_name']) && !empty($_POST['gis_upload'])) {
  $db = new db_cn\Connector();
  $db->query("insert into gishuun (name, upload_pic) values(:name, :upload_pic);");
  $db->bind(":name", $_POST['gis_name']);
  $db->bind(":upload_pic", $_POST['gis_upload']);
  $db->execute();
}

header("Location: index.php");

?>
