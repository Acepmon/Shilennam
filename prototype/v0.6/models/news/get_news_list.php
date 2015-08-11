<?php
  include "../DB_CN.php";

  $data = [];

  $db = new db_cn\Connector();
  $news = new db_cn\Table("news");

  // 0. id;
  // 1. title;
  // 2. thumb;
  // 3. img;
  // 4. desc;
  // 5. date;

  $news_result = $news->select("*");

  foreach ($news_result as $n) {
    $list = [];

    $id = $n['id'];
    $title = $n['title'];
    $db->query("select path from uploads where id = :id");
    $db->bind(":id", $n['thumb_upload_id']);
    $thumb = $db->single()['path'];
    // $thumb = $uploads->selectFirst("path", "id = "+$n['thumb_upload_id'])['path'];

    $db->query("select path from uploads where id = :id");
    $db->bind(":id", $n['img_upload_id']);
    $img = $db->single()['path'];
    // $img = $uploads->selectFirst("path", "id = "+$n['img_upload_id'])['path'];
    $desc = $n['description'];
    $date = $n['date'];

    $list['id'] = $id;
    $list['title'] = $title;
    $list['thumb'] = $thumb;
    $list['img'] = $img;
    $list['desc'] = substr($desc, 0, 250)."...";
    $list['date'] = $date;

    array_push($data, $list);
  }

  echo json_encode($data);
?>
