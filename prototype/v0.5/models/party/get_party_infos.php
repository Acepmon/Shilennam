<?php
include "../DB_CN.php";

$params = json_decode(file_get_contents('php://input'), true);

$id = $params['party_id'];



 ?>
