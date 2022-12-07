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
$route['listin'] = 'listin';
$route['view_list_in'] = 'listin/view_list_in';
$route['edit_list_in'] = 'listin/edit_list_in';
