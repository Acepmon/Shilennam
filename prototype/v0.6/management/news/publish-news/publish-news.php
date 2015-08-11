<?php

include "../../../models/DB_CN.php";
include "../../../controllers/helper-functions.php";

$errors = array();
$data = array();

if (empty($_POST['title'])) {
  $errors['title'] = true;
}
if (empty($_POST['date'])) {
  $errors['date'] = true;
}
if (empty($_POST['img_upload'])) {
  $errors['img_upload'] = true;
}
if (empty($_POST['thumb_upload'])) {
  $errors['thumb_upload'] = true;
}
if (empty($_POST['desc'])) {
  $errors['desc'] = true;
}

if (empty($errors)) {
  $db = new db_cn\Connector();
  $db->query("insert into news (title, date, img_upload_id, thumb_upload_id, description) values (:title, :date, :img_upload_id, :thumb_upload_id, :description); ");
  $db->bind(":title", $_POST['title']);
  $db->bind(":date", $_POST['date']);
  $db->bind(":img_upload_id", $_POST['img_upload']);
  $db->bind(":thumb_upload_id", $_POST['thumb_upload']);
  $db->bind(":description", $_POST['desc']);
  $db->execute();
}

header("Location: index.php");

 ?>
