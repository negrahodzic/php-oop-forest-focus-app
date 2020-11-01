<?php

session_start();

if(!isset($_SESSION['chosen'])){
    $_SESSION['chosen'] = new Chosen_Tree();
}

