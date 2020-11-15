<?php
include "connection/connection.php";

// Clicked on button "Start planting"
if (isset($_POST['start']) && $_POST['start'] = "Start planting" && $_POST['chosenTreeId']!= null) {
    $chosen_tree = select_chosen_tree($_POST['chosenTreeId']);
    if ($chosen_tree != null) {
        $score =  $_POST['minutes'] * select_tree($chosen_tree->get_tree_id())->get_points();
        update_chosen_tree($_POST['chosenTreeId'], $_POST['minutes'], $_POST['status'], $score); 
        $min =  $_POST['minutes'];
        echo '<script type="text/javascript">startTimer('.$min.');</script>';
    }
} 

// Timer is done. Successfully planted tree.
if(isset($_POST['s']) && isset($_POST['id'])){
    update_chosen_tree_status($_POST['id'], $_POST['s']); 
}

// Clicked on button "Give up"
if (isset($_POST['give_up']) && $_POST['give_up'] = "Give up" && $_POST['chosenTreeId']!= null) {
    update_chosen_tree_status($_POST['chosenTreeId'], "Withered"); 
} 

function update_chosen_tree($chosen_tree_id, $duration = 0, $status="Not started", $score = 0){
    global $mysqli;
    $updateQuery = "UPDATE chosen_tree SET duration = '$duration', status='$status', score = '$score'
                    WHERE chosen_tree_id = '$chosen_tree_id';";
    if($mysqli->query($updateQuery)===true){
        echo "<script type='text/javascript'>alert('Succefully updated tree.');</script>";
        $_SESSION['chosen'] = select_chosen_tree($chosen_tree_id);
    } else {
        echo "<script type='text/javascript'>alert('Failed while updating tree.');</script>";
    }
}

function update_chosen_tree_status($chosen_tree_id, $status){
    global $mysqli;
    $updateQuery = "UPDATE chosen_tree SET status='$status'
                    WHERE chosen_tree_id = '$chosen_tree_id';";
    if($mysqli->query($updateQuery)===true){
        echo "<script type='text/javascript'>alert('Succefully updated tree.');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Failed while updating tree.');</script>";
    }
}

