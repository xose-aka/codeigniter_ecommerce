<?php

class Base extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    /**
     * @return bool
     */
    public function is_logged_admin()
    {
        $admin_id = $this->session->userdata('user_id');

        if ($admin_id == 1) return true;
        else return false;
    }

    public function image($folder)
    {
        $config['upload_path'] = '.' . '/assets/uploads/' . $folder . '/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['file_name'] = uniqid(rand());
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
            return array('error' => $this->upload->display_errors());
        else
            return array('upload_data' => $this->upload->data());
    }
}