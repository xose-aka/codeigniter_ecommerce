<?php

include_once 'Base_Model.php';

class Product_model extends Base_Model
{
    public $table = 'products';

    private $pages = [];

    public function relation_category()
    {
        $query = "SELECT *
                    FROM `categories c`
                    JOIN `products p`
                    ON p.category_id=c.id;";
        $result = $this->db->_execute($query);
        var_dump($result);
        die();

        if($result->num_rows === 0)
            redirect('404_override');
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function products_with_category_brand()
    {
            $query = "SELECT p.id, p.title, c.title category, b.title brand, p.color, p.price, p.quantity, p.created_at
                      FROM `products` p
                        JOIN `categories` c
                            ON p.category_id=c.id
                        JOIN `brands` b
                            ON p.brand_id=b.id
                      ORDER BY p.id DESC;";
        return mysqli_fetch_all($this->db->_execute($query), MYSQLI_ASSOC);
    }

    public function get_product_with_relations($status = 'public')
    {
        $query = "SELECT p.id, p.title, d.title discount, d.percent discount_percent, p.price_dollar, p.price_euro, p_i.title file_name, p_i.path, p.created_at
                  FROM `products` p
                    JOIN `product_images` p_i
                      ON p_i.product_id=p.id
                    LEFT JOIN `discounts` d
                        ON p.discount_id=d.id
                    WHERE p_i.main = 1 AND `status`='$status'    
                  ORDER BY p.id DESC";

        return mysqli_fetch_all($this->db->_execute($query), MYSQLI_ASSOC);
    }

    /**
     * @param $id
     * @return array|false|null
     */
    public function find_with_relations($id)
    {
        $query = "SELECT p.id, p.title, d.title product_discount, p.discount_id, c.title category_title, p.category_id, p.recommended,
                    b.title bran_title, p.brand_id, p.price_dollar, p.price_euro, p.color, p.weight, p.quantity, p.material, 
                    p.style, p.description, p.status, p.created_at, p.updated_at
                  FROM `products` p
                    JOIN `categories` c
                        ON p.category_id=c.id
                    JOIN `brands` b
                      ON p.brand_id=b.id
                    LEFT JOIN `discounts` d
                        ON p.discount_id=d.id
                        WHERE p.id=$id";
        $result = $this->db->_execute($query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    /**
     * @param $product_id
     * @return array
     */
    public function images($product_id)
    {
        $query = "SELECT *
                  FROM product_images p_i
                  WHERE p_i.product_id=$product_id";
        $result = $this->db->_execute($query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function paginate($limit)
    {
        try {
            // Find out how many items are in the table
            $total = $this->get_total();

            // How many pages will there be
            $pages = ceil($total / $limit);

            // What page are we currently on?
            $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                'options' => array(
                    'default'   => 1,
                    'min_range' => 1,
                ),
            )));

            // Calculate the offset for the query
            $offset = ($page - 1)  * $limit;

            if ($offset < 0) $offset = 0;

            $items = $this->page_query($limit, $offset);

            $this->pages = [
                'page'  => $page,
                'pages' => $pages
            ];

            return $items;

        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
    }

    public function paginate_data()
    {
        return $this->pages;
    }

    public function page_query($limit, $offset)
    {
        // Prepare the paged query
        $query = "SELECT p.id, p.title, c.title category, b.title brand, d.title discount, p.color, p.price_dollar, p.quantity, p.created_at
                    FROM (SELECT *
                            FROM `$this->table`
                            ORDER BY `id` DESC
                            LIMIT $limit
                            OFFSET $offset) p
                    JOIN `categories` c
                        ON p.category_id=c.id
                    JOIN `brands` b
                        ON p.brand_id=b.id
                    LEFT JOIN `discounts` d 
                        ON p.discount_id=d.id";

        $result = $this->db->_execute($query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function limit_with_relations($limit, $order, $status = 'public')
    {
        $query = "SELECT p.id, p.title, d.title discount, d.percent discount_percent, p.price_dollar, p.price_euro, p_i.title file_name, 
                    p_i.path, p.created_at
                  FROM (SELECT * 
                            FROM `$this->table` p
                            WHERE p.status = '$status'  
                            ORDER BY `id` $order 
                            LIMIT $limit
                      ) p
                    JOIN `product_images` p_i
                      ON p_i.product_id=p.id
                    LEFT JOIN `discounts` d
                        ON p.discount_id=d.id
                        WHERE p_i.main = 1 
                  ORDER BY p.id DESC";

        $result = $this->db->_execute($query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function get_by_category($category_id)
    {
        $query = "SELECT p.id, p.title, d.title product_discount, p.price_dollar, p_i.title file_name, p_i.path, p.created_at
                  FROM (SELECT * 
                            FROM `$this->table`
                            WHERE `category_id`=$category_id AND `status`='public'
                            ORDER BY `id` DESC 
                      ) p
                    JOIN `product_images` p_i
                      ON p_i.product_id=p.id
                    LEFT JOIN `discounts` d
                        ON p.discount_id=d.id
                        WHERE p_i.main = 1";
        $result = $this->db->_execute($query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function get_by_title($title)
    {
        $query = "SELECT p.id, p.title, d.title product_discount, p.price_dollar, p.price_euro, p_i.title file_name, p_i.path, p.created_at
                  FROM (SELECT * 
                            FROM `$this->table`
                            WHERE `title` LIKE '%$title%' AND `status`='public'
                            ORDER BY `id` DESC 
                      ) p
                    JOIN `product_images` p_i
                      ON p_i.product_id=p.id
                    LEFT JOIN `discounts` d
                        ON p.discount_id=d.id
                        WHERE p_i.main = 1";
        $result = $this->db->_execute($query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}