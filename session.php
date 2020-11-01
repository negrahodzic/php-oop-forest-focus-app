<?php

session_start();

if(!isset($_SESSION['chosen'])){
    $_SESSION['chosen'] = new Chosen_Tree();
    echo "molim te";
    echo "* * * SESSION prazno: ".$_SESSION['chosen']->get_chosen_tree_id();
}

echo "*** SESSION nakon session_start : ".$_SESSION['chosen']->get_chosen_tree_id();

