<?php
    
header('Content-type: text/html; charset=utf-8');
require './DB_CN.php';

class Party_Editor {
    public static function add($values = array()) {
        $party = new \db_cn\Table("party");
        $party->insert("code,title,acronym", $values);        
    }
    public static function edit($target_placement = array()) {
        
    }
}

$action = (isset($_POST['action']) ? $_POST['action'] : null);

if (isset($action)) {
    if ($action == "Add New Party Record") {
        $values = array("", "", "");
        $values[0] = "'".$_POST['party-code']."'";
        $values[1] = "'".$_POST['party-title']."'";
        $values[2] = "'".$_POST['party-acronym']."'";
        Party_Editor::add($values);
        header('Location: ../manage/editor.php');
    }
    if ($action == "party_edit_get") {
        $id = (isset($_POST['party_record_id']) ? $_POST['party_record_id'] : null);
        if (isset($id)) {
            $party = new \db_cn\Table("party");
            $values = $party->select("code,title,acronym", "id = ".$id);
            $print = "";
            foreach ($values as $value) {
                foreach ($value as $val) {
                    $print .= $val . "::";
                }
            }
            $print = substr($print, 0, -2);
            echo $print;
        }
    }
    if ($action == "party_edit") {
        
    }
}