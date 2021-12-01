<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Base.php';

class Brand extends Base
{
    protected $rules = [
        [
            'field'   => 'title',
            'label'   => 'Title',
            'rules'   => 'required'
        ],
        [
            'field'   => 'slug',
            'label'   => 'Slug',
            'rules'   => 'required'
        ]
    ];

    private $image_folder_path = '/assets/uploads/brand/';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('brand_model', 'brand');
        $this->load->helper(['brand']);
    }

    public function index()
    {
        if ($this->is_logged_admin())
        {
            $data['brands'] = $this->brand->get(Base_Model::ORDER_BY_DESC);
            $this->load->view('admin/brand/index', $data);
        }
        else
            redirect('');
    }

    public function create()
    {
        if ($this->is_logged_admin())
        {
            $this->load->view('admin/brand/create');
        }
        else
            redirect('');
    }

    public function store()
    {
        if ($this->is_logged_admin())
        {
            $this->form_validation->set_rules($this->rules);

            if (empty($_FILES['image']['name']))
                $this->form_validation->set_rules("image","Image", "required");

            if ($this->form_validation->run() == FALSE) $this->load->view('admin/brand/create');
            else {
                $callback = $this->image('brand');

                if (isset($callback['error'])) {
                    $this->load->view('admin/brand/create', $callback['error']);
                    die();
                }

                $file_path = $this->image_folder_path . $callback['upload_data']['file_name'];

                redirect(store_brand($this->brand, $this->session, $file_path, $this->input));
            }
        }
        else
            redirect('');
    }

    public function show($id)
    {
        if ($this->is_logged_admin())
        {
            $data['category'] = $this->brand->find($id);
            $this->load->view('admin/category/show', $data);
        }
        else
            redirect('');
    }

    public function edit($id)
    {
        if ($this->is_logged_admin())
        {
            $data['category'] = $this->category->find($id);
            $this->load->view('admin/category/edit', $data);
        }
        else
            redirect('');
    }

    public function update($id)
    {
        if ($this->is_logged_admin())
        {
            update_category($id, $this->category, $this->session);
            redirect('admin/category');
        }
        else
            redirect('');
    }

    public function delete($id)
    {
        if ($this->is_logged_admin())
        {
            $callback = $this->category->delete($id);
            if ($callback == TRUE) $this->session->set_flashdata('success', 'Updated!');
            else $this->session->set_flashdata('error', 'Something wrong!');

            redirect('admin/category');
        }
        else
            redirect('');
    }
}