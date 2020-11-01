<?php
include "connection/connection.php";

if (isset($_POST['treeWasChosen'])) { 
    chooseTree($_POST['treeWasChosen']);
}

function chooseTree($id)
{
    global $mysqli;
    $insertQuery = "INSERT INTO chosen_tree (tree_id, duration, datetime, status, score) 
                    VALUES ('$id', '0', 'NOW()', 'Not started', '0');";
    if($mysqli->query($insertQuery)===true){
        echo "<script type='text/javascript'>alert('Succefully chose tree. Last inserted id: $mysqli->insert_id');</script>";
        $_SESSION['chosen'] = select_chosen_tree($mysqli->insert_id);
        echo "* * * SESSION choose tree : ".$_SESSION['chosen']->get_chosen_tree_id();
    } else {
        echo "<script type='text/javascript'>alert('Failed while choosing tree.');</script>";
    }
}





