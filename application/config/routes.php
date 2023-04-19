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
$route['loginAdmin'] = 'control_login/login_admin';

$route['CloseSystem'] = 'control_login/CloseSystem';

// Main
$route['Statistic/(:any)'] = 'welcome/AllStatistic/$1';
$route['RegStudent/(:num)/(:any)'] = 'control_admission/reg_student/$1/$2';
$route['CheckRegister'] = 'Welcome/CheckRegister';

//นักเรียน
$route['StudentLogin'] = 'Control_students/StudentLogin';
$route['StudentCheckLogin'] = 'Control_login/CheckLogin';
$route['StudentHome'] = 'Control_students/StudentsHome';
$route['StudentsEdit'] = 'Control_students/StudentsEdit';
$route['StudentsStatus'] = 'Control_students/StudentsStatus';


$route['Students/Logout'] = 'Control_students/logoutStudent';
$route['Students/Print'] = 'Control_students/PDFForStudent';

$route['Confirm'] = 'Control_confirm/StudentsConfirm';
$route['Confirm/Logout'] = 'Control_login/Confirmlogout';
$route['Confirm/Print'] = 'Control_confirm/PDFForStudent';

//admin
$route['AdminHome'] = 'admin/Control_admin_admission';
$route['admin/system/(:any)'] = 'admin/Control_admin_admission/AdminSystem';

$route['admin/Print/(:any)'] = 'admin/Control_admin_admission/PagePrint';
$route['admin/Print/(:any)/(:any)/(:num)'] = 'admin/Control_admin_admission/pdf_type_all/$1/$2/$3';

$route['admin/Student/Update/(:any)'] = 'admin/Control_admin_admission/update_recruitstudent/$1';

$route['admin/PrintConfirm/(:any)'] = 'admin/Control_admin_confirm/PagePrintConnfirm/$1';

$route['admin/Surrender/(:any)'] = 'admin/Control_admin_surrender/PageSurrenderMain/$1';

$route['admin/Recruitment/(:num)'] = 'admin/control_admin_admission/index/$1';
$route['admin/Recruitment/CheckData/(:any)'] = 'admin/Control_admin_admission/edit_recruitstudent/$1';

$route['admin/admission/add'] = 'admin/control_admin_admission/add';

$route['admin/Statistic/(:any)'] = 'admin/control_admin_admission/statistic_student/$1';

$route['admin/news'] = 'admin/control_admin_news';
$route['admin/news/add'] = 'admin/control_admin_news/add';

$route['admin/logout'] = 'admin/Control_admin_admission/logout';