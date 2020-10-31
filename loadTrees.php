<?php
include "connection/connection.php";
include "classes/tree.php";
include "classes/chosen_tree.php";

$trees = array();
$chosen_tree = null;

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

function select_chosen_tree($chosen_tree_id)
{
    global $chosen_tree;
    global $mysqli;

    $query = "SELECT * from chosen_tree WHERE chosen_tree_id = $chosen_tree_id";
    $data = $mysqli->query($query);

    if ($row = $data->fetch_object()) {
        $chosen_tree = new Chosen_Tree();
        $chosen_tree->set_chosen_tree_id($row->chosen_tree_id);
        $chosen_tree->set_tree_id($row->tree_id);
        $chosen_tree->set_duration($row->duration);
        $chosen_tree->set_datetime($row->datetime);
        $chosen_tree->set_status($row->status);
        $chosen_tree->set_score($row->score);
    }
}

function select_tree($id)
{
    global $mysqli;

    $query = "SELECT * from tree WHERE id = $id";
    $data = $mysqli->query($query);

    if ($row = $data->fetch_object()) {
        $tree = new Tree();
        $tree->set_id($row->id);
        $tree->set_name($row->name);
        $tree->set_img($row->img);
        $tree->set_description($row->description);
        $tree->set_points($row->points);
        return $tree;
    }
}


?>