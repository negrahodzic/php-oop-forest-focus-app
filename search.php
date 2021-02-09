<?php
include "classes/tree.php";
include "classes/chosen_tree.php";
include "classes/planting_history.php";
include "selectTrees.php";
include "plantingHistory.php";
session_start();

if (isset($_SESSION['searchResult'])) {
    echo "keyword :-".$_GET['search_keyword']."-";
    if($_GET['search_keyword']!=" ") {
        $_SESSION['searchResult'] = search($_GET['search_keyword']);
        echo " 1 ";
    } else {
        $_SESSION['searchResult'] = select_all_trees_with_outcome();
        echo " 2 ";
    }  
} 

function search($search_keyword)
{ //TODO: dodaj ignorecase
    $allTrees = select_all_trees_with_outcome();
    $searchResult = array();
    foreach ($allTrees as $tr) {
        $name = select_tree($tr->get_tree_id())->get_name();
        echo " $name ";
        if (substr($name, 0, strlen($search_keyword)) == $search_keyword) {
            $searchResult[] = $tr;
        }
    }
    return $searchResult;
}
