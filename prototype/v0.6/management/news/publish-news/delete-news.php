<?php

include "../../../models/DB_CN.php";

$db = new db_cn\Connector();

if (!empty($_GET['id'])) {
  try {
    $db->query("delete from news where id = :id");
    $db->bind(":id", $_GET['id']);
    $db->execute();
    $data['error'] = false;
    $data['message'] = "Амжилттай устгагдлаа!";
  } catch (Exception $ex) {
    $data['error'] = true;
    $data['message'] = "Амжилтгүй боллоо!";
  }
}

header ("Location: index.php");

?>
