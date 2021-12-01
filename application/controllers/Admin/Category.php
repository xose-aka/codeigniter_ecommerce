<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Base.php';

class Category extends Base
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

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'category');
        $this->load->helper(['category']);
    }

    public function index()
    {
        if ($this->is_logged_admin())
        {
            $data['categories'] = $this->category->get(Base_Model::ORDER_BY_DESC);
            $this->load->view('admin/category/index', $data);
        }
        else
            redirect('');
    }

    public function create()
    {
        if ($this->is_logged_admin())
        {
            $this->load->view('admin/category/create');
        }
        else
            redirect('');
    }

    public function store()
    {
        if ($this->is_logged_admin())
        {
            $this->form_validation->set_rules($this->rules);

            if ($this->form_validation->run() == FALSE) $this->load->view('admin/category/create');
            else redirect(store_category($this->category, $this->session, $this->input));
        }
        else
            redirect('');
    }

    public function show($id)
    {
        if ($this->is_logged_admin())
        {
            $data['category'] = $this->category->find($id);
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