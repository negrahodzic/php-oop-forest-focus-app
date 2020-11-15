<?php
class Chosen_Tree
{
    private $chosen_tree_id;
    private $tree_id;
    private $duration;
    private $status;
    private $score;

    //set
    public function set_chosen_tree_id($chosen_tree_id)
    {
        $this->chosen_tree_id = $chosen_tree_id;
    }

    public function set_tree_id($tree_id)
    {
        $this->tree_id = $tree_id;
    }

    public function set_duration($duration)
    {
        $this->duration= $duration;
    }

    public function set_status($status)
    {
        $this->status = $status;
    }
    public function set_score($score)
    {
        $this->score = $score;
    }

    //get
    public function get_chosen_tree_id()
    {
        return $this->chosen_tree_id;
    }
    public function get_tree_id()
    {
        return $this->tree_id;
    }
    public function get_duration()
    {
        return $this->duration;
    }

    public function get_status()
    {
        return $this->status;
    }
    public function get_score()
    {
        return $this->score;
    }
}
