<?php
include "connection/connection.php";

if (isset($_POST['start']) && $_POST['start'] = "Start planting" && $_POST['chosenTreeId']!= null) {
    $chosen_tree = select_chosen_tree($_POST['chosenTreeId']);
    if ($chosen_tree != null) {
        $score =  $_POST['minutes'] * select_tree($chosen_tree->get_tree_id())->get_points();
        update_chosen_tree($_POST['chosenTreeId'], $_POST['minutes'], "NOW()","Not started", $score);     
    }
} 

function update_chosen_tree($chosen_tree_id, $duration = 0, $datetime = "NOW()", $status="Not started", $score = 0){
    global $mysqli;
    $updateQuery = "UPDATE chosen_tree SET duration = '$duration', 
                    datetime='$datetime', status='$status', score = '$score'
                    WHERE chosen_tree_id = '$chosen_tree_id';";
    if($mysqli->query($updateQuery)===true){
        echo "<script type='text/javascript'>alert('Succefully updated tree.');</script>";
        select_chosen_tree($_POST['chosenTreeId']);
    } else {
        echo "<script type='text/javascript'>alert('Failed while updating tree.');</script>";
    }
}