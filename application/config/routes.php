<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] =  'Login';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'login';

//Dashboard
$route['dashboard'] = 'dashboard';
$route['pencarian'] = 'dashboard/pencarian';

//User
$route['user'] = 'user';


//MLO
$route['mlo'] = 'mlo';

//EMKL
$route['emkl'] = 'emkl';

//Vessel
$route['vessel'] = 'vessel';

//Container
$route['container'] = 'container';


//MV-In
$route['list_in'] = 'list_in';
$route['view_list_in'] = 'list_in/view_list_in';
$route['edit_list_in'] = 'list_in/edit_list_in';
$route['add_container'] = 'list_in/add_container';
$route['delete_container'] = 'list_in/delete_container';

//Payment In
$route['payment_in'] = 'payment_in';
$route['tambah_payment_in'] = 'payment_in/tambah_payment_in';
$route['update_payment/(:any)'] = 'payment_in/update_payment/(:any)';
$route['edit_payment_in/(:any)'] = 'payment_in/update_payment_in/(:any)';
$route['view_payment_in/(:any)'] = 'payment_in/view_payment_in/(:any)';
$route['add_container_payment_in/(:any)'] = 'payment_in/add_container_payment_in/(:any)';

//Process In
$route['process_in'] = 'process_in';