<?php
include "connection/connection.php";

if (isset($_POST['treeWasRemoved'])) { 
    removeTree($_POST['treeWasRemoved']);
}

function removeTree($id)
{
    global $mysqli;
    $removeQuery = "DELETE FROM chosen_tree WHERE chosen_tree_id = $id";
    if($mysqli->query($removeQuery)===true){
        echo "<script type='text/javascript'>alert('Succefully removed tree.');</script>";
        global $chosen_tree;
        $chosen_tree = null;
    } else {
        echo "<script type='text/javascript'>alert('Failed while removing tree.');</script>";
    }
}