<?php

include_once 'Base.php';

class Banner extends Base
{

    private $banner_orders = [
            false, false, false, false, false, false, false, false, false, false
        ];

    private $image_path = '/assets/uploads/banner/';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model', 'banner');
        $this->load->helper(['file']);
        $this->load->driver('cache');

//        if ( !$this->cache->file->get('banner_order') )
//            $this->cache->file->save('banner_order', $this->banner_orders, 0);
    }

    public function index()
    {
        if ($this->is_logged_admin())
        {
            $data['banners'] = $this->banner->get();
            $this->load->view('admin/banner/index', $data);
        }
        else
            redirect('');
    }

    public function create()
    {
        if ($this->is_logged_admin())
        {
            $data['banner_orders'] = $this->cache->file->get('banner_order');
            $this->load->view('admin/banner/create', $data);
        }
        else
            redirect('');
    }

    public function store()
    {
        $this->form_validation->set_rules("main_text","Main text", "required");
        $this->form_validation->set_rules("second_text","Second text", "required");

        if (empty($_FILES['image']['name']) || strlen($_FILES['image']['name'][0]) == 0)
            $this->form_validation->set_rules("image","Image", "required");

        if ($this->form_validation->run() == FALSE) $this->load->view('admin/brand/create');
        else
        {
//            $banner_order = $this->input->post('banner_order');

            $callback = $this->image('banner');

            if (isset($callback['error'])) {
                $this->load->view('admin/banner/create', $callback['error']);
                die();
            }
            $file_path = $this->image_path . $callback['upload_data']['file_name'];

            $callback = $this->banner->store($file_path);

            if ($callback)
            {
                $this->session->set_flashdata('success', 'Saved');
                redirect('admin/banner');
            }
            else
            {
                $this->session->set_flashdata('error', 'Something gone wrong');
                $this->load->view('admin/banner/create');
            }
        }
    }

    public function delete()
    {
        $banner_id = $this->input->post('banner_id');

        $banner    = $this->banner->find($banner_id);
        $callback  = unlink('.' . $banner['img']);

        if ($callback)
        {
            $this->session->set_flashdata('success', 'Deleted');
            $this->banner->delete($banner_id);
        }
        else
            $this->session->set_flashdata('error', 'Something went wrong');

        redirect('admin/banner');
    }

    private function is_slot_available($banner_order)
    {
        return $this->banner_orders[$banner_order];
    }

    private function get_free_slot_index($banner_order)
    {
        for ($i = 0; $i < count($this->banner_orders); $i++ )
        {
            if ( $this->banner_orders[$i] ) return $i;
        }
    }
}