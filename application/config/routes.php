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
$route)['get_fluxo_caixa'] = 'fluxo_de_caixa_controller/fluxo_de_caixa;| This route will tell the Router which controller/method to use if those
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
$route['default_controller'] = 'welcome';
$route['home'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['migrate'] = 'utils/migrate';
$route['listar_cliente'] = 'cliente/listar_cliente';
$route['cadastrar_cliente'] = 'cliente/cadastrar_cliente';
$route['deletar_cliente/(:num)'] = 'cliente/delete/$1';
$route['alterar_cliente/(:num)'] = 'cliente/form_altera/$1';
$route['listar_fornecedores'] = 'fornecedor/listar_fornecedor';
$route['cadastrar_fornecedores'] = 'fornecedor/cadastrar_fornecedor';
$route['alterar_fornecedor/(:num)'] = 'fornecedor/form_altera/$1';
$route['deletar_fornecedor/(:num)'] = 'fornecedor/delete/$1';
$route['deletar_peca/(:num)'] = 'estoque/delete/$1';
$route['carregar_foto/(:num)'] = 'estoque/form_foto/$1';
$route['listar_pecas'] = 'estoque/listar_pecas';
$route['cadastrar_peca'] = 'estoque/cadastrar_peca';
$route['mostrar_reservas'] = 'reserva/mostrar_reserva';
$route['resgistrar_reserva'] = 'reserva/registrar_reserva';
$route['fluxo_caixa'] = 'fluxodecaixa/fluxo_de_caixa';