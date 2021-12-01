<?php

include_once 'Base_Model.php';

class Banner_model extends Base_Model
{
    protected $table = 'banners';

    public function __construct()
    {
        parent::__construct();
    }

    public function store($img)
    {
        $main_text    = $this->input->post('main_text');
        $second_text  = $this->input->post('second_text');
        $query = "INSERT INTO `$this->table`(`main_text`, `second_text`, `img`) VALUES ('$main_text', '$second_text', '$img')";
        return $this->db->_execute($query);
    }

    public function find($id)
    {
        $query = "SELECT * FROM `$this->table` WHERE `id`=$id;";
        $result = $this->db->_execute($query);

        if($result->num_rows === 0)
            redirect('404_override');
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}