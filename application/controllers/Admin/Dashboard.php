<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Base.php';

class Dashboard extends Base
{
    public function index()
    {
        if ($this->is_logged_admin())
            $this->load->view('admin/index');
        else
            redirect($this->agent->referrer());
    }
}