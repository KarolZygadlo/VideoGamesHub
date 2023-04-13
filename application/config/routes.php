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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['strona-glowna'] = 'home';
$route['wszystkie-posty'] = 'home/posts';
$route['wszystkie-posty/(.*)'] = 'home/posts/$1';
$route['aktualnosci'] = 'home/news';
$route['kontakt'] = 'home/contact';
$route['poradniki'] = 'home/tutorials';
$route['gamezone'] = 'home/gamezone';
$route['pomoc-i-wsparcie'] = 'home/helpdesk';
$route['twoje-poradniki'] = 'tutorials';
$route['twoje-recenzje'] = 'reviews';
$route['twoja-biblioteka-gier'] = 'library';
$route['profil-uzytkownika/(.*)/(.+)'] = 'home/user_profile/$1/$2';
$route['edycja-profilu/(.*)/(.+)'] = 'users/edit_profile/$1/$2';
$route['post/(.*)'] = 'home/post/$1';
$route['wpis/(.*)/(.+)'] = 'home/entry/$1/$2';
$route['gamezone/(.*)/(.+)'] = 'home/game/$1/$2';
$route['poradnik/(.*)/(.+)'] = 'home/tutorial_view/$1/$2';
$route['pobierz-pdf/(.*)/(.+)'] = 'generate_pdf/create_pdf/$1/$2';
$route['czytaj-pdf/(.*)/(.+)'] = 'home/read_ebook/$1/$2';
$route['recenzja/(.*)/(.+)'] = 'home/review/$1/$2';
$route['recenzje'] = 'home/reviews';

$route['logowanie'] = 'users/index';
$route['rejestracja-regulamin'] = 'users/register_regulations';
$route['rejestracja'] = 'users/register_view';
$route['aktywacja/(.*)'] = 'users/active_account/$1';
$route['zapomnialem_hasla'] = 'users/forgot_password';
