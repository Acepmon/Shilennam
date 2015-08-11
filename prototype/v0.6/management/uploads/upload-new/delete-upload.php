<?php

include "../../../models/DB_CN.php";


if (!empty($_GET['id'])) {
  $db = new db_cn\Connector();
  try {
    $db->query("delete from uploads where id = :id");
    $db->bind(":id", $_GET['id']);
    $db->execute();
    $data['error'] = false;
    $data['message'] = "Амжилттай утсгагдсан!";
  } catch (Exception $ex) {
    $data['exception'] = $ex->getMessage();
    $data['error'] = true;
    $data['message'] = "Амжилтгүй боллоо! Энэхүү зураг ашиглагдаж байна!";
  }
}
header("Location: index.php");

 ?>
