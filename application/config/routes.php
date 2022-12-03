<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] =  'Login';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'login';

//Dashboard
$route['dashboard'] = 'dashboard';
$route['hasil_cari'] = 'dashboard/hasil_cari';

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
