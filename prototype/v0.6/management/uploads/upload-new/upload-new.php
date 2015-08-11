<?php

include "../../../models/DB_CN.php";

if (!empty($_POST['name']) && !empty($_FILES['file'])) {
  $name = $_POST['name'];
  $file = $_FILES['file'];

  if (!empty($file['name'])) {
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];

    // upload the file
    move_uploaded_file($file_tmp, "../../../resources/uploads/".$file_name);

    // insert into database
    $db = new db_cn\Connector();
    $db->query("insert into uploads (name, path) values (:name, :path)");
    $db->bind(":name", $name);
    $db->bind(":path", $file_name);
    $db->execute();
  }

}

header("Location: index.php");

?>
