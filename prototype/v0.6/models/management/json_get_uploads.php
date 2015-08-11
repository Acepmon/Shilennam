<?php

include "../DB_CN.php";

$uploads = new db_cn\Table("uploads");
$result = $uploads->select("*", "1=1", "id", "desc");

echo json_encode($result);

?>
