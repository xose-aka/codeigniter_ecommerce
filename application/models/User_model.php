<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_username_and_password($username, $password)
    {
        $query = "SELECT *
                    FROM `users`
                    WHERE `username`='$username' AND `password`='$password';";

        return mysqli_fetch_array($this->db->_execute($query), MYSQLI_ASSOC);
    }

}