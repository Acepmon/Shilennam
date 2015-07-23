<?php

include "../DB_CN.php";

$params = json_decode(file_get_contents('php://input'), true);
$db = new db_cn\Connector();

$data = [];

// 0. id;
// 1. title;
// 2. thumb;
// 3. img;
// 4. desc;
// 5. date;


if (!empty($params['id'])) {
  try {
  $db->query("select * from news where id = :id");
  $db->bind(":id", $params['id']);
  $news = $db->single();

  $id = $news['id'];
  $title = $news['title'];
  $db->query("select path from uploads where id = :id");
  $db->bind(":id", $news['thumb_upload_id']);
  $thumb = $db->single()['path'];
  $db->query("select path from uploads where id = :id");
  $db->bind(":id", $news['img_upload_id']);
  $img = $db->single()['path'];
  $desc = $news['description'];
  $date = $news['date'];

  $data['id'] = $id;
  $data['title'] = $title;
  $data['thumb'] = $thumb;
  $data['img'] = $img;
  $data['desc'] = $desc;
  $data['date'] = $date;
  
} catch (Exception $ex) {
  $data['message'] = $ex->getMessage();
}
}

echo json_encode($data);

 ?>
