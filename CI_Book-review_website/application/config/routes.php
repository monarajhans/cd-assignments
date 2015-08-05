<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['book_page/(:any)'] = "main/book_page/$1";
$route['add_review/(:any)'] = "main/add_review/$1";
$route['404_override'] = '';

//end of routes.php