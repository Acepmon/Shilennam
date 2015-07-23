<?php

include "../DB_CN.php";

$news = new db_cn\Table("news");
$uploads = new db_cn\Table("uploads");
$result = $news->select("*", "1=1", "id", "desc");

$json = [];

foreach ($result as $res) {
  $row = [];

  $db = new db_cn\Connector();
  $db->query("select path from uploads where id = :id");
  $db->bind(":id", $res['thumb_upload_id']);
  $thumb = $db->single()['path'];
  // $thumb = $uploads->selectFirst("path", "id = "+$res['thumb_upload_id'])['path'];
  $title = $res['title'];
  $date = $res['date'];
  $id = $res['id'];

  $row['id'] = $id;
  $row['thumb'] = $thumb;
  $row['title'] = $title;
  $row['date'] = $date;

  array_push($json, $row);
}

echo json_encode($json);

?>
