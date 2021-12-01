<?php

class Base_Model extends CI_Model
{
    protected $table = '';

    protected $keys = [];

    const ORDER_BY_DESC = 'DESC';
    const ORDER_BY_ASC = 'ASC';

    /**
     * @param string $order
     * @return array
     */
    public function get($order = 'ASC')
    {
        $query = "SELECT * FROM `$this->table` ORDER BY `id` $order;";
        return mysqli_fetch_all($this->db->_execute($query), MYSQLI_ASSOC);
    }

    /**
     * @param $limit
     * @param string $order
     * @return array
     */
    public function limit($limit, $order = 'ASC')
    {
        $query = "SELECT * FROM `$this->table` ORDER BY `id` $order LIMIT $limit;";
        return mysqli_fetch_all($this->db->_execute($query), MYSQLI_ASSOC);
    }

    /**
     * @param array $data
     * @return int
     */
    public function insert(array $data)
    {
        $keys = '';
        $values = '';
        $counter = 0;
        $last = count($data);

        foreach ($data as $key => $value) {
            $counter++;
            if ($counter == $last) {
                $keys   .= "`$key`";
                $values .= "'$value'";
            } else {
                $keys   .= "`$key`, ";
                $values .= "'$value', ";
            }
        }

        $query = "INSERT INTO `$this->table` ($keys) VALUES ($values);";

        $this->db->_execute($query);

        return $this->db->insert_id();
    }

    /**
     * @param $id
     * @return array|false|null
     */
    public function find($id)
    {
        $query = "SELECT * FROM `$this->table` WHERE `id`=$id;";
        $result = $this->db->_execute($query);

        if($result->num_rows === 0)
            redirect('404_override');
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    /**
     * @param $id
     * @param array $data
     * @return resource
     */
    public function update($id, array $data)
    {
        $fields = '';

        foreach ($data as $key => $value)
            $fields   .= "`$key`='$value', ";

        date_default_timezone_set('Europe/Rome');
        $now = date('Y-m-d h:i:s', time());
        $fields   .= "`updated_at`='$now'";

        $query = "UPDATE `$this->table` SET $fields WHERE `id`=$id;";

        return $this->db->_execute($query);
    }

    /**
     * @param $id
     * @return resource
     */
    public function delete($id)
    {
        $query = "DELETE FROM `$this->table` WHERE `id`=$id;";
        return $this->db->_execute($query);
    }

    /**
     * @return int
     */
    public function get_total()
    {
        $query = "SELECT
                    COUNT(*) `element_size`
                  FROM
                    `$this->table`";
        $result = $this->db->_execute($query);
        return (int) mysqli_fetch_array($result, MYSQLI_ASSOC)['element_size'];
    }
}