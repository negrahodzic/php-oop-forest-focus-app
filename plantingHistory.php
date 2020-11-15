<?php

include "connection/connection.php";

$treesWithOutcome = array();

function select_all_trees_with_outcome() 
{
    global $treesWithOutcome;
    global $mysqli;

    $query = "SELECT * from chosen_tree";
    $data = $mysqli->query($query);
    $flag = false;

    while ($row = $data->fetch_object()) { //prodji kroz ceo niz chosen_tree objekata
        if($row->status == 'Planted' or  $row->status == 'Withered'){ //proveri da li imaju outcome
            $tree = new Planting_History();
            $tree->set_tree_id($row->tree_id);

            foreach ($treesWithOutcome as $tr) { 
                if ($tree->get_tree_id() == $tr->get_tree_id()) { //proveri da li su vec u planting_history
                    if($row->status == 'Planted' ){ // u nizu je i outcome = planted
                        $tr->set_planted($tr->get_planted() + 1);
                        $tr->set_total_score($tr->get_total_score() + $row->score);
                    } else { // u nizu je i outcome = withered
                        $tr->set_withered($tr->get_withered() + 1); 
                    }
                    $flag = true;
                    break;  
                }                        
            }

            if(!$flag){
                //nije u nizu planting history
                if($row->status == 'Planted'){ //ali je uspesno zasadjen
                    $tree->set_planted(1);
                    $tree->set_withered(0);
                    $tree->set_total_score($row->score);
                } else { //ali nije uspesno zasadjen
                    $tree->set_planted(0);
                    $tree->set_withered(1);
                    $tree->set_total_score(0);
                }
                $treesWithOutcome[] = $tree; //dodaj u niz nakon postavljenih vrednosti
            } 
            $flag = false;
        } 
    }  

    return $treesWithOutcome;
}

//dodaj da update radi u bazi za planting history
//samo za nove?
//ne treba da svaki put racuna sve preko chosen_tree tabele