<?php
include "connection/connection.php";
include "classes/tree.php";

$trees = array();

function select_all_trees()
{
    global $trees;
    global $mysqli;

    $query = "SELECT * from tree";
    $data = $mysqli->query($query);

    while ($row = $data->fetch_object()) {
        $tree = new Tree();
        $tree->set_id($row->id);
        $tree->set_name($row->name);
        $tree->set_img($row->img);
        $tree->set_description($row->description);
        $tree->set_points($row->points);
        $trees[] = $tree;
    }
}

?>