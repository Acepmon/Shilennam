<?php

include "../DB_CN.php";

$uploads = new db_cn\Table("uploads");
$result = $uploads->select("name");

echo json_encode($result);

?>
