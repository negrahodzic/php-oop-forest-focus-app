<?php
include "connection/connection.php";

function chooseTree($id)
{
    global $mysqli;
    $insertQuery = "INSERT INTO chosen_tree (tree_id, duration, datetime, status, score) 
                    VALUES ('$id', '0', 'NOW()', 'Not started', '0');";
    if($mysqli->query($insertQuery)===true){
        echo "<script type='text/javascript'>alert('Succefully chose tree. inserted id: $mysqli->insert_id');</script>";
        select_chosen_tree($mysqli->insert_id);
    } else {
        echo "<script type='text/javascript'>alert('Failed while choosing tree.');</script>";
    }
}

if (isset($_POST['treeWasChosen'])) { 
    chooseTree($_POST['treeWasChosen']);
}

// TODO: if post delete

