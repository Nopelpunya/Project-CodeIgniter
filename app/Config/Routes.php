<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/membership', 'Home::membership');


$routes->get('/registration/(:num)', 'Home::registration/$1');
$routes->post('/register/member', 'Home::registerMember');


$routes->get('/jadwal', 'Home::jadwal');
$routes->get('/lokasi', 'Home::lokasi');


$routes->get('/login', 'Login::index');

$routes->post('/login', 'Login::login');


$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/logout', 'Dashboard::logout');


$routes->get('/profile', 'Dashboard::profile');
$routes->post('/profile/update/(:num)', 'Profile::update/$1');
// update data mitra oleh mitra
$routes->post('/profile/mitra/update/(:num)', 'Profile::updateMitra/$1');


$routes->get('/mitra', 'Dashboard::mitra');
$routes->post('/mitra/add', 'MitraController::create');
$routes->post('/mitra/update/(:num)', 'MitraController::updateMitra/$1');
$routes->get('/mitra/delete/(:num)', 'MitraController::delete/$1');


$routes->get('/members', 'Dashboard::member');
$routes->post('/members/add', 'MemberController::create');
$routes->post('/members/update/(:num)', 'MemberController::updateMember/$1');
$routes->get('/members/delete/(:num)', 'MemberController::delete/$1');



$routes->get('/users', 'Dashboard::user');
$routes->post('/user/add', 'UserController::create');
$routes->post('/user/update/(:num)', 'UserController::update/$1');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');



$routes->get('/pricing', 'Dashboard::paket');
$routes->post('/pricing/add', 'PaketController::create');
$routes->post('/pricing/update/(:num)', 'PaketController::update/$1');
$routes->get('/pricing/delete/(:num)', 'PaketController::delete/$1');

$routes->get('/program', 'Dashboard::program');
$routes->post('/program/add', 'ProgramController::create');
$routes->post('/program/update/(:num)', 'ProgramController::update/$1');
$routes->get('/program/delete/(:num)', 'ProgramController::delete/$1');


$routes->get('/settings', 'Dashboard::setting');
$routes->post('/settings/update/(:num)', 'SettingController::update/$1');







