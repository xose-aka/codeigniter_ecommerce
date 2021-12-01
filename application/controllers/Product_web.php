<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Web.php';

class Product_web extends Web
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }

    public function index()
    {
        $this->data['products'] = $this->product->get_product_with_relations();
        $this->data['upcoming_products'] = $this->product->limit_with_relations(6, Base_Model::ORDER_BY_DESC, 'upcoming');

        $this->load->view('web/products', $this->data);
    }

    public function show($product_id)
    {
        $product_id = base64_decode(strtr($product_id, '-_~', '+/='));
        $this->data['product']    = $this->product->find_with_relations($product_id);
        $this->data['images']     = $this->product->images($product_id);

        $this->load->view('web/product/show', $this->data);
    }

    public function find()
    {
        $title = $this->input->post('text');
        $this->data['products']   = $this->product->get_by_title($title);
        $this->load->view('web/products', $this->data);
    }
}