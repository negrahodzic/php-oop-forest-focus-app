<?php
include "connection/connection.php";

if (isset($_POST['remove']) && $_POST['remove'] = "Remove tree") {
    removeTree($_POST['chosenTreeId']);
}

function removeTree($id)
{
    global $mysqli;
    $removeQuery = "DELETE FROM chosen_tree WHERE chosen_tree_id = $id";
    if ($mysqli->query($removeQuery) === true) {
        // echo "<script type='text/javascript'>alert('Succefully removed tree.');</script>";
        global $chosen_tree;
        $chosen_tree = null;
        // unset($_SESSION['chosen']);
    } else {
        echo "<script type='text/javascript'>alert('Failed while removing tree.');</script>";
    }
}


