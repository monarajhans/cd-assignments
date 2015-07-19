<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['destination/(:any)'] = "main/destination/$1";
$route['join/(:any)/(:any)'] = "main/join/$1/$2";
$route['404_override'] = '';

//end of routes.php