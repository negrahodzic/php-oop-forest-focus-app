<?php
class Planting_History
{
    private $tree_id;
    private $planted;
    private $withered;
    private $total_score;

    //set
    public function set_tree_id($tree_id)
    {
        $this->tree_id = $tree_id;
    }
    public function set_planted($planted)
    {
        $this->planted= $planted;
    }
    public function set_withered($withered)
    {
        $this->withered= $withered;
    }
    public function set_total_score($total_score)
    {
        $this->total_score = $total_score;
    }

    //get
    public function get_tree_id()
    {
        return $this->tree_id;
    }
    public function get_planted()
    {
        return $this->planted;
    }
    public function get_withered()
    {
        return $this->withered;
    }
    public function get_total_score()
    {
        return $this->total_score;
    }
}
