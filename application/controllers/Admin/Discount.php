<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Base.php';

class Discount extends Base
{
    protected $rules = [
        [
            'field'   => 'title',
            'label'   => 'Title',
            'rules'   => 'required'
        ],
        [
            'field'   => 'percent',
            'label'   => 'Percent',
            'rules'   => 'required'
        ],
        [
            'field'   => 'description',
            'label'   => 'Description',
            'rules'   => 'required'
        ]
    ];

    protected $image_folder_path = '/assets/uploads/discount/';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('discount_model', 'discount');
        $this->load->helper('discount');
    }

    public function index()
    {
        if ($this->is_logged_admin())
        {
            $data['discounts'] = $this->discount->get(Base_Model::ORDER_BY_DESC);
            $this->load->view('admin/discount/index', $data);
        }
        else
            redirect('');
    }

    public function create()
    {
        if ($this->is_logged_admin())
        {
            $this->load->view('admin/discount/create');
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

            if ($this->form_validation->run() == FALSE)
                $this->load->view('admin/discount/create');
            else {
                $callback = $this->image('discount');

                if (isset($callback['error'])) {
                    $this->load->view('admin/discount/create', $callback['error']);
                    die();
                }

                $file_path = $this->image_folder_path . $callback['upload_data']['file_name'];
                redirect(store_discount($this->discount, $this->session, $this->input, $file_path));
            }
        }
        else
            redirect('');
    }

    public function show($id)
    {
        if ($this->is_logged_admin())
        {
            $data['discount'] = $this->discount->find($id);
            $this->load->view('admin/discount/show', $data);
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
            update_category($id, $this->category, $this->session, $this->input);
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