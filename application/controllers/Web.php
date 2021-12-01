<?php

class Web extends CI_Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model', 'cart');
        $this->load->model('category_model', 'category');
        $this->load->driver('cache');
        $this->load->helper('cache');

        $this->check_cart();
        $this->data['categories'] = cached_categories($this->category, $this->cache);
    }

    private function check_cart()
    {
        $user_id = $this->session->userdata('user_id');

        if ($user_id == FALSE)
        {
            $this->data['product_count']      = 0;
            $this->data['sum_of_price_dollar'] = 0;
            $this->data['sum_of_price_euro'] = 0;
        }
        else
        {
            $result = $this->cart->get_products_in_cart($user_id);
            $this->data['product_count'] = $result['num_of_prod'];
            $this->data['sum_of_price_dollar'] = $result['sum_of_price_dollar'];
            $this->data['sum_of_price_euro']   = $result['sum_of_price_euro'];
        }
    }
}