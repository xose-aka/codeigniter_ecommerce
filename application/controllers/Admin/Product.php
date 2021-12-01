<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Base.php';

class Product extends Base
{
    protected $rules = [
        [
            'field'   => 'title',
            'label'   => 'Title',
            'rules'   => 'required'
        ],
        [
            'field'   => 'category_id',
            'label'   => 'Category',
            'rules'   => 'required'
        ],
        [
            'field'   => 'brand_id',
            'label'   => 'Brand',
            'rules'   => 'required'
        ],
        [
            'field'   => 'price_dollar',
            'label'   => 'Price dollar',
            'rules'   => 'required'
        ],
        [
            'field'   => 'price_euro',
            'label'   => 'Price euro',
            'rules'   => 'required'
        ],
        [
            'field'   => 'material',
            'label'   => 'Material',
            'rules'   => 'required'
        ],
        [
            'field'   => 'color',
            'label'   => 'Color',
            'rules'   => 'required'
        ],
        [
            'field'   => 'recommended',
            'label'   => 'Recommend',
            'rules'   => 'required'
        ],
        [
            'field'   => 'status',
            'label'   => 'Publish status',
            'rules'   => 'required'
        ],
        [
            'field'   => 'quantity',
            'label'   => 'Quantity',
            'rules'   => 'required'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->load->model('category_model', 'category');
        $this->load->model('brand_model', 'brand');
        $this->load->model('product_image_model', 'product_image');
        $this->load->model('discount_model', 'discount');
        $this->load->library('upload');
        $this->load->helper(['product']);
    }

    public function index()
    {
        if ($this->is_logged_admin())
        {
            $limit = 4;
            $data['products'] = $this->product->paginate($limit);
            $data['paginate'] = $this->product->paginate_data();
            $data['limit'] = $limit;
            $this->load->view('admin/product/index', $data);
        }
        else
            redirect('');
    }

    public function create()
    {
        if ($this->is_logged_admin())
        {
            $data['categories'] = $this->category->get();
            $data['brands']     = $this->brand->get();
            $data['discounts']  = $this->discount->get();
            $this->load->view('admin/product/create', $data);
        }
        else
            redirect('');
    }

    public function store()
    {
        if ($this->is_logged_admin())
        {
            $this->form_validation->set_rules($this->rules);

            if (empty($_FILES['images']['name']) || strlen($_FILES['images']['name'][0]) == 0)
                $this->form_validation->set_rules("image","Image", "required");

            if ($this->form_validation->run() == FALSE) {
                $data['categories'] = $this->category->get();
                $data['brands']     = $this->brand->get();
                $this->load->view('admin/product/create' ,$data);
            }
            else {
                $last_insert_id = store_product($this->product, $this->input);

                if ($last_insert_id != 0)
                    $this->image_product($last_insert_id);
                else
                {
                    $data = array('error' => 'Something went wrong.');
                    $this->load->view('admin/product/create', $data);
                }

                $this->session->set_flashdata('success', 'Successfully created');
                redirect('admin/product');
            }
        }
        else
            redirect('');
    }

    public function show($product_id)
    {
        $data['product'] = $this->product->find_with_relations($product_id);
        $data['images']  = $this->product->images($product_id);
        $this->load->view('admin/product/show', $data);
    }

    public function edit($product_id)
    {
        $data['product']    = $this->product->find_with_relations($product_id);
        $data['images']     = $this->product->images($product_id);
        $data['categories'] = $this->category->get();
        $data['brands']     = $this->brand->get();
        $data['discounts']  = $this->discount->get();
        $this->load->view('admin/product/edit', $data);
    }

    public function update($product_id)
    {
        if ($this->is_logged_admin()) {
            $this->form_validation->set_rules($this->rules);

            if ($this->form_validation->run() == FALSE) {

                $data['product']    = $this->product->find_with_relations($product_id);
                $data['images']     = $this->product->images($product_id);
                $data['categories'] = $this->category->get();
                $data['brands']     = $this->brand->get();
                $data['discounts']  = $this->discount->get();
                $this->load->view('admin/product/edit', $data);
            } else {

                $callback = update_product($this->product, $this->input, $product_id);

                if ($callback != 0) {
                    $this->session->set_flashdata('success', 'Successfully updated');
                    redirect('admin/product/edit/' . $product_id);
                }
                else {
                    $data = array('error' => 'Something went wrong.');
                    $this->load->view('admin/product/edit', $data);
                }
            }
        }
        else
            redirect('');
    }

    private function image_product($parent_id)
    {
        $path = '/assets/uploads/product/';
        $config['upload_path'] = '.' . $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        for ($key = 0; $key <  count($_FILES['images']['name']); $key++)
        {
            $_FILES['file']['name']     = $_FILES['images']['name'][$key];
            $_FILES['file']['type']     = $_FILES['images']['type'][$key];
            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
            $_FILES['file']['error']    = $_FILES['images']['error'][$key];
            $_FILES['file']['size']     = $_FILES['images']['size'][$key];

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = time() . '_' . uniqid(rand()) . '.' . $ext;

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('file')) return array('error' => $this->upload->display_errors());
            else $this->product_image->store($parent_id, $config['file_name'], $path, $key);
        }
    }
}