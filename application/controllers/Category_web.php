<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Web.php';

class Category_web extends Web
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }

    public function index($category_id)
    {
        $this->data['products'] = $this->product->get_by_category($category_id);
        $this->data['upcoming_products'] = $this->product->limit_with_relations(6, Base_Model::ORDER_BY_DESC, 'upcoming');

        $this->load->view('web/products', $this->data);
    }
}