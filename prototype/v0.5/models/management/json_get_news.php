<?php

include "../DB_CN.php";

$news = new db_cn\Table("news");
$uploads = new db_cn\Table("uploads");
$result = $news->select("*");

$json = [];

foreach ($result as $res) {
  $row = [];

  $thumb = $uploads->selectFirst("path", "id = "+$res['thumb_upload_id'])['path'];
  $title = $res['title'];
  $date = $res['date'];

  $row['thumb'] = $thumb;
  $row['title'] = $title;
  $row['date'] = $date;

  array_push($json, $row);
}

echo json_encode($json);

?>
