<?php

include "../DB_CN.php";

$db = new db_cn\Connector();

$params = json_decode(file_get_contents('php://input'),true);
$data = [];

try {
  $db->query("delete from news where id = :id");
  $db->bind(":id", $params['id']);
  $db->execute();
  $data['error'] = false;
  $data['message'] = "Амжилттай устгагдлаа!";
} catch (Exception $ex) {
  $data['error'] = true;
  $data['message'] = "Амжилтгүй боллоо!";
}

echo json_encode($data);

?>
