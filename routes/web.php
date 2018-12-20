<?php

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

//$router->group(['prefix' => 'users', 'namespace' => 'App\Http\Controllers'], function($router) {
$router->group(['prefix' => 'users'], function($router) {

    // http://localhost:8000/users
    $router->get('/', 'UserController@index');

    // http://localhost:8000/users/50  
    $router->get('{id}', 'UserController@find');

    // http://localhost:8000/users  
    $router->post('/', 'UserController@create');
    // $app->post('/', ['middleware' => 'auth',
    //     'uses' => 'UserController@create']);
    // http://localhost:8000/users/50  
    $router->put('{id}', 'UserController@update');

    // http://localhost:8000/users/50  
    $router->delete('{id}', 'UserController@delete');
});


$api = app('Dingo\Api\Routing\Router');

$api->version('v1,', function($api) {

    $api->group(['prefix' => 'oauth'], function($api) {
        $api->post('token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    });

    $api->group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth', 'cors']], function($api) {
        //controller route
        $api->get('users','UserController@show');
    });
});
