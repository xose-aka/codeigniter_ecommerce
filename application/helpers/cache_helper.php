<?php

if ( !function_exists('cached_banners') )
{
    function cached_banners(Banner_model $banner, CI_Cache $cache)
    {
        $banners = $cache->file->get('banners');
        if ( !$banners )
        {
            $banners = $banner->get();
            $cache->file->save('banners',  $banners, 0);
        }

        return $banners;
    }
}

if ( !function_exists('cached_brands') )
{
    function cached_brands(Brand_model $brand, CI_Cache $cache)
    {
        $brands = $cache->file->get('brands');
        if ( !$brands )
        {
            $brands = $brand->get();
            $cache->file->save('brands',  $brands, 0);
        }

        return $brands;
    }
}

if ( !function_exists('cached_categories') )
{
    function cached_categories(Category_model $category, CI_Cache $cache)
    {
        $categories = $cache->file->get('categories');
        if ( !$categories )
        {
            $categories = $category->get();
            $cache->file->save('categories',  $categories, 0);
        }

        return $categories;
    }
}