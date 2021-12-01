<?php

if (!function_exists('dd')) {
    function dd($value, ...$values)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }
}