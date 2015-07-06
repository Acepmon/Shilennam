<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getTagForResult($code, $content = "", $count = "") {
    $data = "<a href='economics.php?tab=3&year=all&sector_code=$code#eco'><li class='list-group-item'>";
    $data .= $content;
    $data .= "<span class='badge'>$count</span></li></a>";
    return $data;
}

$action = isset($_POST['action']) ? $_POST['action'] : "";
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";

if (!empty($action) && !empty($keyword)) {
    if ($action == "search_ediin") {
        require_once './DB_CN.php';
        $eza = new db_cn\Table("ediin_zasag_angi");
        $results = $eza->select("*", "type COLLATE UTF8_GENERAL_CI like '%$keyword%'");
        $full_data = "";
        $full_data .= "<a href='economics.php?tab=3&year=all&sector_code= #eco'><li class='list-group-item no-type'><b>Ангилалд орогдоогүйг хайх</b></li></a>";
        foreach ($results as $res) {
            $tocount = new db_cn\Table("companies");
            $count = $tocount->selectFirst("count(*) as count", "sector_code = '".$res['code']."'");
            $full_data .= getTagForResult($res['code'], $res['type'], $count['count']);
        }
        echo $full_data;
    }
}
