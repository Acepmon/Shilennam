<?php

include "../DB_CN.php";

$params = json_decode(file_get_contents('php://input'),true);
$data = [];

$db = new db_cn\Connector();

try {
  // Delete from uploads directory
  // $db->query("select path from uploads where id = :id");
  // $db->bind(":id", $params['id']);
  // $path = $db->single()['path'];
  // unlink("../../resources/uploads/".$path);

  // Delete from database
  $db->query("delete from uploads where id = :id");
  $db->bind(":id", $params['id']);
  $db->execute();
  $data['error'] = false;
  $data['message'] = "Амжилттай утсгагдсан!";
} catch (Exception $ex) {
  $data['exception'] = $ex->getMessage();
  $data['error'] = true;
  $data['message'] = "Амжилтгүй боллоо! Энэхүү зураг ашиглагдаж байна!";
}

echo json_encode($data);

 ?>
