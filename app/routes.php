<?php 

$router->get('admin/users','UsersController@index');
$router->get('admin/users/add','UsersController@add');
$router->post('admin/users/add','UsersController@store');
<<<<<<< HEAD
$router->get('admin/users/edit/{id}','UsersController@edit');
$router->post('admin/users/edit/{id}','UsersController@update');
$router->get('admin/users/delete','UsersController@destroy');
$router->post('admin/users/search','UsersController@search');
$router->get('admin/users/active','UsersController@changeActive');

$router->get('*','ErrorController@error');
$router->post('*','ErrorController@error');
=======
$router->get('admin/users/edit','UsersController@edit');
$router->get('admin/users/delete','UsersController@destroy');

>>>>>>> CSHOP_DAI_USERS

?>