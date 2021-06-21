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
$route['default_controller'] = 'Main_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['contact_form'] = 'Main_controller/contact_form';
$route['form_submit'] = 'Main_controller/form_submit';
$route['login'] = 'Main_controller/login';
$route['client_registeration'] = 'Main_controller/client_registeration';
$route['verify_login'] = 'Main_controller/verify_login';
$route['home'] = 'Main_controller/home';
$route['logout'] = 'Main_controller/logout';
$route['index'] = 'Main_controller/index';
$route['add_client'] = 'Main_controller/add_client';
$route['manage_client'] = 'Main_controller/manage_client';

$route['update_client'] = 'Main_controller/update_client';
$route['delete_client'] = 'Main_controller/delete_client';
$route['edit_form'] = 'Main_controller/edit_form';

$route['view_form'] = 'Main_controller/view_form';
$route['update_form'] = 'Main_controller/update_form';
$route['hello'] = 'Main_controller/hello';
$route['test'] = 'Main_controller/test';
$route['request_api'] = 'Main_controller/request_api';

$route['form_submission'] = 'Main_controller/form_submission';
$route['view_submission'] = 'Main_controller/view_submission';
$route['submission_details'] = 'Main_controller/submission_details';

$route['regular_expression'] = 'Main_controller/regular_expression';

$route['update_query'] = 'Main_controller/update_query';

$route['lead'] = 'Main_controller/lead';
