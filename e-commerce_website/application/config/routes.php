<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
//$route['display_product/(:any)'] = "products/display_product/$1";
$route['update_cart/(:any)'] = "products/update_cart/$1";
$route['google/(:any)/(:any)'] = "products/google/$1/$2";
$route['404_override'] = '';

//end of routes.php