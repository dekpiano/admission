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
|		my-controller/my-method	-> my_controller/my_method welcome/not_404
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'control_login/login_main';


$route['admin/admission/(:num)'] = 'admin/control_admin_admission/index/$1';
$route['admin/admission/add'] = 'admin/control_admin_admission/add';

$route['admin/news'] = 'admin/control_admin_news';
$route['admin/news/add'] = 'admin/control_admin_news/add';

// [[รับสมัครนักเรียน]]
$route['RegStudent'] = 'control_recruitstudent';
$route['selectlevel'] = 'control_admission/select_level';
$route['RegStudent/welcome/(:any)'] = 'control_admission/welcome_student/$1';
$route['checkRegister'] = 'control_admission/checkdata_student';
$route['RegStudent/(:any)'] = 'control_admission/reg_student/$1';
$route['checkRegister/dataStudent'] = 'control_admission/data_user';
$route['CloseStudent'] = 'control_recruitstudent/close_student';
$route['Announce'] = 'control_admission/print_student';

// ติดต่อ
$route['CloseSystem'] = 'control_login/close_system';


//นักเรียน
$route['StudentLogin'] = 'Control_students/StudentLogin';
$route['StudentCheckLogin'] = 'Control_students/CheckLogin';
$route['StudentHome'] = 'Control_students/StudentsHome';
$route['StudentData'] = 'Control_students/StudentsData';