<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Web.php';

class Register extends Web
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('user_model', 'user');
        $this->load->helper('form');
    }

    function index()
    {
        $this->load->view();
    }
}