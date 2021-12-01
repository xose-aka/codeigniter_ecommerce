<?php

include_once 'Base_Model.php';

class Cart_model extends Base_Model
{
    protected $table = 'cart_items';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_with_relations()
    {
        $query = "SELECT p.id, p.title, p_i.title file_name, p_i.path, p.price_dollar, p.price_euro, c_i.quantity
                    FROM cart_items c_i
                    JOIN products p
                    ON c_i.product_id=p.id
                    JOIN product_images p_i
                    ON p_i.product_id=p.id
                    WHERE p_i.main=true";

        $result = $this->db->_execute($query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function get_products_in_cart($user_id)
    {
        $query = "SELECT COUNT(c_i.id) num_of_prod, SUM(c_i.total_price_dollar) sum_of_price_dollar, SUM(c_i.total_price_euro) sum_of_price_euro
                    FROM cart_items c_i
                    WHERE c_i.user_id=$user_id";

        return mysqli_fetch_array($this->db->_execute($query), MYSQLI_ASSOC);
    }
}