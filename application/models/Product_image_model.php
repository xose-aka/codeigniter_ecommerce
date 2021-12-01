<?php

include_once 'Base_Model.php';

class Product_image_model extends Base_Model
{
    public $table = 'product_images';

    /**
     * @param $parent_id
     * @param $file_name
     * @param $path
     * @param $key
     * @return resource
     */
    public function store($parent_id, $file_name, $path, $key)
    {
        if ($key == 0)
            $query = "INSERT INTO `$this->table`(`product_id`, `title`, `path`, `main`)
                        VALUES ('$parent_id', '$file_name' , '$path', '1');";
        else
            $query = "INSERT INTO `$this->table`(`product_id`, `title`, `path`)
                        VALUES ('$parent_id', '$file_name' , '$path');";
        return $this->db->_execute($query);
    }
}