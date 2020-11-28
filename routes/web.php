<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/ref'], function () use ($router) {
    $router->get('/supplier', ['uses' => 'References\SuppliersController@GetAllSuppliers']);
    $router->post('/supplier', ['uses' => 'References\SuppliersController@AddNewSupplier']);

    $router->get('/category', ['uses' => 'References\CategoryController@GetAllCategories']);
    $router->get('/category/{id}', ['uses' => 'References\CategoryController@GetCategoryById']);
    $router->post('/category', ['uses' => 'References\CategoryController@AddNewCategory']);

});

$router->group(['prefix' => '/inventory'], function () use ($router){
    $router->post('/supplier', ['uses' => 'References\SuppliersController@AddNewSupplier']);
});