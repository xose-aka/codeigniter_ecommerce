<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override']       = '';

$route['login/sign_in']     = 'login/sign_in';
$route['logout']            = 'login/logout';
$route['register']          = 'register';

$route['products']          = 'product_web';
$route['products/(:any)']   = 'product_web/show/$1';
$route['products/find']     = 'product_web/find';

$route['change-money']      = 'home/change_money';
$route['category/(:num)']   = 'category_web/index/$1';

$route['cart']              = 'cart';
$route['put_cart']          = 'cart/put_cart';

/* Admin Routes */
$route['admin/dashboard']   = 'admin/dashboard';

$route['admin/brand']               = 'admin/brand';
$route['admin/brand/create']        = 'admin/brand/create';
$route['admin/brand/store']         = 'admin/brand/store';
$route['admin/brand/show/(:num)']   = 'admin/brand/show/$1';
$route['admin/brand/edit/(:num)']   = 'admin/brand/edit/$1';
$route['admin/brand/update/(:num)'] = 'admin/brand/update/$1';
$route['admin/brand/delete/(:num)'] = 'admin/brand/delete/$1';

$route['admin/banner'] = 'admin/banner';
$route['admin/banner/create'] = 'admin/banner/create';
$route['admin/banner/store'] = 'admin/banner/store';
$route['admin/banner/show/(:num)'] = 'admin/banner/show/$1';
$route['admin/banner/edit/(:num)'] = 'admin/banner/edit/$1';
$route['admin/banner/update']      = 'admin/banner/update';
$route['admin/banner/delete'] = 'admin/banner/delete';

$route['admin/category'] = 'admin/category';
$route['admin/category/create'] = 'admin/category/create';
$route['admin/category/store'] = 'admin/category/store';
$route['admin/category/show/(:num)'] = 'admin/category/show/$1';
$route['admin/category/edit/(:num)'] = 'admin/category/edit/$1';
$route['admin/category/update/(:num)'] = 'admin/category/update/$1';
$route['admin/category/delete/(:num)'] = 'admin/category/delete/$1';

$route['admin/discount']               = 'admin/discount';
$route['admin/discount/create']        = 'admin/discount/create';
$route['admin/discount/store']         = 'admin/discount/store';
$route['admin/discount/show/(:num)']   = 'admin/discount/show/$1';
$route['admin/discount/(:num)/edit']   = 'admin/discount/edit/$1';
$route['admin/discount/update/(:num)'] = 'admin/discount/update/$1';
$route['admin/discount/delete/(:num)'] = 'admin/discount/delete/$1';

$route['admin/product'] = 'admin/product';
$route['admin/product/create'] = 'admin/product/create';
$route['admin/product/store'] = 'admin/product/store';
$route['admin/product/show/(:num)'] = 'admin/product/show/$1';
$route['admin/product/edit/(:num)'] = 'admin/product/edit/$1';
$route['admin/product/update/(:num)'] = 'admin/product/update/$1';

//$route['admin/product-variant'] = 'admin/product_variant';
//$route['admin/product-variant/create'] = 'admin/product_variant/create';
//$route['admin/product-variant/store'] = 'admin/product_variant/store';
/* End of file routes.php */
/* Location: ./application/config/routes.php */