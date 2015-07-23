<?php

include "../DB_CN.php";
include "../../controllers/helper-functions.php";

$party = new db_cn\Table("party");
$results = $party->select("id,title,acronym, logo_url");
$broken_results = break_array($results, 11);

$data = [];

foreach ($broken_results as $result) {
    $row = [];

    foreach ($result as $res) {
        $row_more = [];

        $party_img = "png/img_error.jpg";
        if (empty($res['logo_url'])) {
            $party_img = "png/img_error.jpg";
        } else {
            $party_img = "party/logos/" . $res['logo_url'];
        }

        // 1. img;
        // 2. id;
        // 3. title;
        // 4. acronym;

        $img = $party_img;
        $id = $res['id'];
        $title = $res['title'];
        $acronym = $res['acronym'];

        $row_more['id'] = $id;
        $row_more['img'] = $img;
        $row_more['title'] = $title;
        $row_more['acronym'] = $acronym;

        array_push($row, $row_more);
    }

    array_push($data, $row);
}

echo json_encode($data);
 ?>
