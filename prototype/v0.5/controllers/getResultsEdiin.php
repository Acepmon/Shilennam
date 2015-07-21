<?php

function getTagForResult($code, $content = "", $count = "") {
    $data = "<a href='economics.php?tab=3&year=all&sector_code=$code&search_query=$content#eco'><li class='list-group-item' style='border: 1px solid lightgray; border-top: 0px; border-radius: 0px;'>";
    $data .= $content;
    $data .= "<span class='badge'>$count</span></li></a>";
    return $data;
}

// Requirement 1:

$action = isset($_POST['action']) ? $_POST['action'] : "";
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";

if (!empty($action) && !empty($keyword)) {
    if ($action == "search_ediin") {
        require_once './DB_CN.php';
        $eza = new db_cn\Table("ediin_zasag_angi");
        $results;
        if ($keyword == "^all^")
          $results = $eza->select("*");
        else
          $results = $eza->select("*", "type COLLATE UTF8_GENERAL_CI like '%$keyword%'");

        $full_data = "";
        $full_data .= "<a href='economics.php?tab=3&year=all&sector_code= #eco'><li class='list-group-item no-type' style='border: 1px solid lightgray; border-top: 0px; border-radius: 0px;'><b>Ангилалд орогдоогүйг хайх</b></li></a>";
        foreach ($results as $res) {
            $companies = new db_cn\Table("companies");
            $irged = new db_cn\Table("irged_aan");
            $cunt = 0;
            $for_counting = [];
            foreach ($companies->select("company", "sector_code = '".$res['code']."'") as $com) {
              $som = $irged->selectFirst("party", "ner = '".$com['company']."' && type = 'c'");
              array_push($for_counting, "".$som['party']);
            }
            $cunt = count(array_count_values($for_counting));


            // $count = $companies->selectFirst("count(*) as count", "sector_code = '".$res['code']."'");
            $full_data .= getTagForResult($res['code'], $res['type'], $cunt);
        }
        echo $full_data;
    }
}
