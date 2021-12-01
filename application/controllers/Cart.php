<?php

include_once 'Web.php';

class Cart extends Web
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model', 'shop_cart');
    }

    public function index()
    {
        $this->data['carts'] = $this->cart->get_with_relations();

        $this->load->view('web/cart', $this->data);
    }

    public function put_cart()
    {
        $user_id = $this->session->userdata('user_id');

        if ($user_id == FALSE)
            redirect('admin/login');

        $product_id         = $this->input->post('product_id');
        $quantity           = $this->input->post('quantity');
        $price_dollar       = $this->input->post('price_dollar');
        $price_euro         = $this->input->post('price_euro');
        $total_price_dollar = $price_dollar * $quantity;
        $total_price_euro   = $price_euro * $quantity;

        $data = [
            'user_id'            => $user_id,
            'product_id'         => $product_id,
            'quantity'           => $quantity,
            'total_price_dollar' => $total_price_dollar,
            'total_price_euro'   => $total_price_euro
        ];

        $callback = $this->shop_cart->insert($data);

        if ($callback)
        {
            $this->session->set_flashdata('success', 'Added');
            redirect('cart');
        }
        else
        {
            $this->session->set_flashdata('error', 'Something wrong');
            redirect($this->agent->referrer());
        }
    }
}