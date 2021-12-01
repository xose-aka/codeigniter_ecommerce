<?php

if ( !function_exists('store_brand') )
{
    function store_brand(Brand_model $brand, CI_Session $session, $file_path, CI_Input $input)
    {
        $data = [
            'title' => $input->post('title'),
            'slug'  => $input->post('slug'),
            'image' => $file_path
        ];

        $callback = $brand->insert($data);
        if ($callback == TRUE) {
            $session->set_flashdata('success', 'Saved!');
            return 'admin/brand';
        }
        else
        {
            $session->set_flashdata('error', 'Something wrong!');
            return 'admin/brand/create';
        }
    }
}
