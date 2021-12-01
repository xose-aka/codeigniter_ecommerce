<?php

if ( !function_exists('store_product') )
{
    function store_product(Product_model $product, CI_Input $input)
    {
        $title        = $input->post('title');
        $style        = $input->post('style');
        $material     = $input->post('material');
        $description  = $input->post('description');

        // filter
        $description = str_replace("'", "\\'", $description);
        $title       = str_replace("'", "\\'", $title);
        $style       = str_replace("'", "\\'", $style);
        $material    = str_replace("'", "\\'", $material);

        $data = [
            'title'        => $title,
            'category_id'  => $input->post('category_id'),
            'brand_id'     => $input->post('brand_id'),
            'style'        => $style,
            'price_euro'   => $input->post('price_euro'),
            'price_dollar' => $input->post('price_dollar'),
            'weight'       => $input->post('weight'),
            'material'     => $material,
            'color'        => $input->post('color'),
            'quantity'     => $input->post('quantity'),
            'recommended'  => $input->post('recommended'),
            'status'       => $input->post('status'),
            'description'  => $description,
            'discount_id'  => $input->post('discount_id')
        ];

        return $product->insert($data);
    }
}

if ( !function_exists('update_product') )
{
    function update_product(Product_model $product, CI_Input $input, $product_id)
    {
        $title        = $input->post('title');
        $style        = $input->post('style');
        $material     = $input->post('material');
        $description  = $input->post('description');

        // filter
        $description = str_replace("'", "\\'", $description);
        $title       = str_replace("'", "\\'", $title);
        $style       = str_replace("'", "\\'", $style);
        $material    = str_replace("'", "\\'", $material);

        $data = [
            'title'        => $title,
            'category_id'  => $input->post('category_id'),
            'brand_id'     => $input->post('brand_id'),
            'style'        => $style,
            'price_euro'   => $input->post('price_euro'),
            'price_dollar' => $input->post('price_dollar'),
            'weight'       => $input->post('weight'),
            'material'     => $material,
            'color'        => $input->post('color'),
            'quantity'     => $input->post('quantity'),
            'recommended'  => $input->post('recommended'),
            'status'       => $input->post('status'),
            'description'  => $description,
            'discount_id'  => $input->post('discount_id')
        ];

        return $product->update($product_id, $data);
    }
}
