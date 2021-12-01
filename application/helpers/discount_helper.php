<?php

if ( !function_exists('store_discount') )
{
    function store_discount(Discount_model $discount, CI_Session $session, CI_Input $input, $file_path)
    {

        $data = [
            'title'       => $input->post('title'),
            'percent'     => $input->post('percent'),
            'description' => $input->post('description'),
            'image'       => $file_path
        ];

        $callback = $discount->insert($data);
        if ($callback != 0) {
            $session->set_flashdata('success', 'Saved!');
            return 'admin/discount';
        }
        else
        {
            $session->set_flashdata('error', 'Something wrong!');
            return 'admin/discount/create';
        }
    }
}

if ( !function_exists('update_discount') )
{
    function update_discount($id, Discount_model $discount, CI_Session $session, CI_Input $input)
    {
        $data = [
            'title'        => $input->post('title'),
            'percent'      => $input->post('percent'),
            'description'  => $input->post('description')
        ];

        $callback = $discount->update($id, $data);

        if ($callback == TRUE) $session->set_flashdata('success', 'Updated!');
        else $session->set_flashdata('error', 'Something wrong!');

        return 'admin/discount';
    }
}
