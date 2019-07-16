<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Control';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index'] = 'control/index';
$route['home'] = 'control/home';
$route['workers'] = 'Control/workers';
$route['dogovors'] = 'control/dogovors';
$route['update_dogovor'] = 'control/update_dogovor';
$route['task'] = 'control/task';
$route['naryad'] = 'control/naryad';
$route['tabels'] = 'control/tabels';
$route['task_deadline'] = 'control/task_deadline';
$route['close_nar'] = 'control/close_nar';
$route['nar_close'] = 'control/nar_close';
$route['naryad_add'] = 'control/naryad_add';
$route['works'] = 'control/works';
$route['quites'] = 'control/quites';
$route['task_del'] = 'control/task_del';
$route['worker_del'] = 'control/worker_del';
$route['specials'] = 'control/specials';
$route['new_nar'] = 'control/new_nar';
$route['objects'] = 'control/objects';
$route['objects_no_update'] = 'control/objects_no_update';
$route['update_cost'] = 'control/update_cost';
$route['worker_task'] = 'control/worker_task';
$route['update_object_status'] = 'control/update_object_status';

