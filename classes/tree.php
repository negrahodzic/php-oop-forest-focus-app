<?php
class Tree
{
    private $id;
    private $name;
    private $img;
    private $description;
    private $points;

    //set
    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }
    public function set_img($img)
    {
        $this->img = $img;
    }
    public function set_description($description)
    {
        $this->description = $description;
    }
    public function set_points($points)
    {
        $this->points = $points;
    }

    //get
    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_img()
    {
        return $this->img;
    }
    public function get_description()
    {
        return $this->description;
    }
    public function get_points()
    {
        return $this->points;
    }
}
