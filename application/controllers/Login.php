<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Web.php';

class Login extends Web
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('user_model', 'user');
        $this->load->helper('form');
        $this->load->helper('login_helper');
    }

    function sign_in()
    {
        $this->form_validation->set_rules("username","Enter username", "required");
        $this->form_validation->set_rules("password","Enter password", "required");

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Invalid credentials');
            redirect($this->agent->referrer());
        }
        else
        {
            $url_to_go = login($this->user, $this->session, $this->agent);
            redirect($url_to_go);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}