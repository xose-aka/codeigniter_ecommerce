<?php

if ( !function_exists('store_category') )
{
    function store_category(Category_model $category_model, CI_Session $session, CI_Input $input)
    {

        $data = [
            'title' => $input->post('title'),
            'slug'  => $input->post('slug')
        ];

        $callback = $category_model->insert($data);
        if ($callback != 0) {
            $session->set_flashdata('success', 'Saved!');
            return 'admin/category';
        }
        else
        {
            $session->set_flashdata('error', 'Something wrong!');
            return 'admin/category/create';
        }
    }
}

if ( !function_exists('update_category') )
{
    function update_category($id, Category_model $category_model, CI_Session $session, CI_Input $input)
    {
        $data = [
            'title' => $input->post('title'),
            'slug'  => $input->post('slug')
        ];

        $callback = $category_model->update($id, $data);

        if ($callback == TRUE) $session->set_flashdata('success', 'Updated!');
        else $session->set_flashdata('error', 'Something wrong!');

        return 'admin/category';
    }
}
