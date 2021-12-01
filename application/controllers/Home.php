<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once 'Web.php';

class Home extends Web
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model', 'banner');
        $this->load->model('product_model', 'product');
        $this->load->model('brand_model', 'brand');

    }

    public function index()
    {
        $this->data['last_products']     = $this->product->limit_with_relations(6, Base_Model::ORDER_BY_DESC);
        $this->data['viewed_products']   = $this->product->limit_with_relations(6, Base_Model::ORDER_BY_DESC);
        $this->data['upcoming_products'] = $this->product->limit_with_relations(6, Base_Model::ORDER_BY_DESC, 'upcoming');

        $this->data['banners'] = cached_banners($this->banner, $this->cache);
        $this->data['brands']  = cached_brands($this->brand, $this->cache);

        $this->load->view('web/index', $this->data);
    }

    public function change_money()
    {
        $unit = $this->input->get('unit');
        if (in_array($unit, ['dollar', 'euro']))
            $this->session->set_userdata('unit', $unit);
    }
}