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
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php
    include "classes/tree.php";
    include "classes/chosen_tree.php";
    include "session.php";
    include "selectTrees.php";
    include "chooseTree.php";
    include "updateTrees.php";
    include "deleteTrees.php";
    ?>

    <div class="card text-center title-back">
        <div class="card-header"></div>
        <div class="card-body title">
            <h5 class="card-title">Forest: Stay focused, be present!</h5>
            <p class="card-text">Forest is an app that helps you stay focused on the important things in life.</p>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="allTrees scrollbar-primary">
                    <?php
                    select_all_trees();
                    foreach ($trees as $tree) :
                    ?> <br>

                        <form action="" method="post">

                            <ul class="list-group">
                                <li class="list-group-item my-list-style"> <?php echo '<img src="img/' . $tree->get_img() . '">'; ?></li>
                                <li class="list-group-item my-list-style">Name - <?php echo "" . $tree->get_name(); ?></li>
                                <li class="list-group-item my-list-style">Description - <?php echo "" . $tree->get_description(); ?></li>
                                <li class="list-group-item my-list-style">Points - <?php echo "" . $tree->get_points(); ?></li>
                                <li class="list-group-item my-list-style d-flex justify-content-center">
                                    <input hidden type="number" name="treeWasChosen" value="<?php echo "" . $tree->get_id(); ?>">
                                    <button type="submit" class="btn btn-outline-light">Choose tree</button>
                                </li>
                            </ul>

                        </form>

                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
            <div class="col-md-4">
                <?php if ($chosen_tree) : ?>
                    <form action="" method="post">
                        <ul class="list-group chosen">
                            <li class="list-group-item my-list-style">Chosen Tree :
                                <?php
                                if ($chosen_tree) {
                                    echo "" . select_tree($chosen_tree->get_tree_id())->get_name();
                                }
                                ?>
                            </li>
                            <li class="list-group-item my-list-style">
                                <?php
                                if ($chosen_tree) {
                                    echo '<img src="img/' . select_tree($chosen_tree->get_tree_id())->get_img() . '">';
                                }
                                ?>
                            </li>
                            <li class="list-group-item my-list-style">Duration : <p id="timer"></p>
                                <div class="input-group">
                                    <input type="number" name="minutes" class="form-control" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_duration(); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">min</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item my-list-style">Score :
                                <div class="input-group">
                                    <input readonly type="number" name="score" class="form-control" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_score(); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">points</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item my-list-style">Status :
                                <input readonly type="text" name="status" id="status" class="form-control" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_status(); ?>">
                            </li>
                            <li class="list-group-item d-flex justify-content-center my-list-style">
                                <input hidden type="number" name="chosenTreeId" id="chosenTreeId" value="<?php if ($chosen_tree) echo "" . $chosen_tree->get_chosen_tree_id(); ?>">
                                <input type="submit" name="remove" value="Remove tree" id="remove" class="btn btn-outline-light">
                                <input type="submit" name="start" value="Start planting" id="start" class="btn btn-outline-light">
                                <input type="submit" name="give_up" value="Give up" id="give_up" class="btn btn-outline-light">
                            </li>
                        </ul>
                    </form>
                <?php else : ?>
                    <ul class="list-group">
                        <li class="list-group-item not-chosen">Please choose tree that you wish to plant!</li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item not-chosen">Planting history </li>
                    <li class="list-group-item  my-list-style">Tree</li>
                    <li class="list-group-item  my-list-style">Number of Planted</li>
                    <li class="list-group-item  my-list-style">Number of Withered</li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        $("#give_up").hide();
    </script>
</body>

</html>