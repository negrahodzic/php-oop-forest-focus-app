<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/timer.js"></script>
    <style>
        .allTrees {
            max-height: 70vh;
            margin-bottom: 10px;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }

        img {
            max-height: 150px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <?php
    //echo "SESSION : ".$_SESSION['chosen']->get_chosen_tree_id();

    include "classes/tree.php";
    include "classes/chosen_tree.php";
    include "session.php";
    include "selectTrees.php";
    include "chooseTree.php";
    include "updateTrees.php";
    include "deleteTrees.php";


    ?>
    <div class="card text-center">
        <div class="card-header"></div>
        <div class="card-body">
            <h5 class="card-title">Forest: Stay focused, be present!</h5>
            <p class="card-text">Forest is an app that helps you stay focused on the important things in life.</p>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                List of all tree species <br><br>
                <div class="allTrees">

                    <?php
                    select_all_trees();
                    foreach ($trees as $tree) :
                    ?>
                        <form action="" method="post">
                            <ul class="list-group">
                                <li class="list-group-item"> <?php echo '<img src="img/' . $tree->get_img() . '">'; ?></li>
                                <li class="list-group-item">Name - <?php echo "" . $tree->get_name(); ?></li>
                                <li class="list-group-item">Description - <?php echo "" . $tree->get_description(); ?></li>
                                <li class="list-group-item">Points - <?php echo "" . $tree->get_points(); ?></li>
                                <li class="list-group-item d-flex justify-content-center">
                                    <input hidden type="number" name="treeWasChosen" value="<?php echo "" . $tree->get_id(); ?>">
                                    <button type="submit" class="btn btn-outline-primary">Choose tree</button>
                                </li>
                            </ul>
                        </form>
                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
            <div class="col-md-4">
                Chosen tree <br><br>
                <form action="" method="post">
                    <ul class="list-group">
                        <li class="list-group-item">Chosen Tree :
                            <?php
                            if ($chosen_tree) {
                                echo "" . select_tree($chosen_tree->get_tree_id())->get_name();
                            }
                            ?>
                        </li>
                        <li class="list-group-item">
                            <?php
                            if ($chosen_tree) {
                                echo '<img src="img/' . select_tree($chosen_tree->get_tree_id())->get_img() . '">';
                            }
                            ?>
                        </li>
                        <li class="list-group-item">Duration : <p id="timer"></p>
                            <div class="input-group">
                                <input type="number" name="minutes" class="form-control" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_duration(); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">min</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">Score :
                            <div class="input-group">
                                <input readonly type="number" name="score" class="form-control" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_score(); ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">points</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">Status :
                            <input readonly type="text" name="status" id="status" class="form-control" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_status(); ?>">
                        </li>
                        <li class="list-group-item d-flex justify-content-center">
                            <input hidden type="number" name="chosenTreeId" id="chosenTreeId" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_chosen_tree_id(); ?>">
                            <input type="submit" name="remove" value="Remove tree" id="remove" class="btn btn-outline-primary">
                            <input type="submit" name="start" value="Start planting" id="start"class="btn btn-outline-primary">
                            <input type="submit" name="give_up" value="Give up" id="give_up" class="btn btn-outline-primary">
                        </li>
                    </ul>
                </form>
            </div>
            <div class="col-md-4">
                Planting history <br><br>
                <ul class="list-group">
                    <li class="list-group-item active">Planting history </li>
                    <li class="list-group-item">Tree</li>
                    <li class="list-group-item">Number of Planted</li>
                    <li class="list-group-item">Number of Withered</li>
                </ul>
            </div>
        </div>
    </div>
    <script>$("#give_up").hide();</script>
</body>

</html>