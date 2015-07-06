<?php

require_once './backend/DB_CN.php';
// Yes
function getListItem($content) {
    $tag = "<li>";
    $tag .= $content;
    $tag .= "</li>";
    return $tag;
}
// Yes
function getList($content = []) {
    $list = "<ol>";
    foreach ($content as $c) {
        $list .= getListItem($c);
    }
    $list .= "</ol>";
    return $list;
}
// Yes
function getOrganizedList($content = []) {
    $first_chars = [];
    $ch = '';
    for ($i = 0; $i < count($content); $i++) {
        $tmp_ch = str_split($content[$i]['code']);
        if ($i == 0) {
            $ch = $tmp_ch[0];
            array_push($first_chars, $tmp_ch[0]);
        } else {
            if ($tmp_ch[0] != $ch) {
                array_push($first_chars, $tmp_ch[0]);
                $ch = $tmp_ch[0];
            }
        }
    }


    $total_results = [];
    for ($i = 0; $i < count($first_chars); $i++) {
        $list = array();
        foreach ($content as $c) {
            $tmp_ch = str_split($c['code']);
            if ($first_chars[$i] == $tmp_ch[0]) {
                array_push($list, $c['code']);
            }
        }
        array_push($total_results, $list);
    }

    return $total_results;
}
// Nope
function rec_tree($arr = []) {
    $ret = [];
    $len = count($arr);
    if ($len > 2) {
        $str = "";
        for ($j = 2; $j < count($arr); $j++) {
            $str .= $arr[$j];
        }
        $str_arr = str_split($str);
        array_push($ret, rec_tree($str_arr));
    } else {
        array_push($ret, $arr);
    }
    return $ret;
}
// Nope
function deep_organize($content = []) {
    $org = [];
    foreach (getOrganizedList($content) as $list) {

        for ($i = 0; $i < count($list); $i++) {
            $tmp_ch = str_split($list[$i]);
            $len = count($tmp_ch);
            if ($len > 1) {
                $str = "";
                for ($j = 1; $j < count($list); $j++) {
                    $str .= $list[$j];
                }
                $str_arr = str_split($str);
                $org = rec_tree($str_arr);
            }
        }
    }
    return $org;
}

function organizeInCharacters($list = []) {
    for ($i = 0; $i < count($list); $i++) {
        
    }
}

echo "<meta charset='utf-8'>";
$eza = new db_cn\Table("ediin_zasag_angi");
$results = $eza->select("*");

// Testing 'organizeInCharacters' function
echo "<pre>", print_r(organizeInCharacters(getOrganizedList($results))), "</pre>";


?>