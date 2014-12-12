<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return 'Hello World';
});

/*
Route::post('foo/bar', function()
{
    return 'Hello World 2';
});

Route::match(array('GET', 'POST'), '/', function()
{
    return 'Hello World';
});
 */

// Registering A Route Responding To Any HTTP Verb
Route::any('foo', function()
{
    return 'Foo';
});

Route::get('user/{id}', function($id)
{
    return 'User '.$id;
});

/*
// Optional Route Parameters With Defaults

Route::get('user/{name?}', function($name = 'John')
{
    return $name;
});

// Regular Expression Route Constraints
Route::get('usuario/{name}', function($name)
{
    return 'Nome: ' . $name;
})
->where('name', '[A-Za-z]+');

Route::get('usuario/{id}', function($id)
{
    return 'ID: ' . $id;
})
->where('id', '[0-9]+');

// Passing An Array Of Wheres - Of course, you may pass an array of constraints when necessary:
Route::get('usuario/{id}/{name}', function($id, $name)
{
    return 'ID: ' . $id . ' and Name: ' . $name;
})
->where(array('id' => '[0-9]+', 'name' => '[a-z]+'));

Route::get('/', function()
{
	return View::make('hello');
});

// Define one route called users
Route::get('users', function()
{
    return View::make('users');
});

// Define one route called products
Route::get('products', function()
{
    return View::make('products.list');
});

// Define the controller and the action of a routr
//Route::get('users', 'UserController@getIndex');
//
// Define one route called usuario
Route::get('usuario', 'UsuarioController@showProfile');
*/

Route::filter('old', function() {
    if (Input::get('age') < 200)
    {
        return Redirect::to('home');
    }
});

// http://localhost/laravel/public/user?age=300 -> Passa
// http://localhost/laravel/public/user?age=150 -> Não passa
Route::get('user', array('before' => 'old', function()
{
    return 'You are over 200 years old!';
}));


Route::get('usuario', array('before' => 'old', 'uses' => 'UsuarioController@showProfile'));

Route::get('usuario/nome/{nome}', function($nome)
{
    if (View::exists('saudacao'))
    {
        return View::make('saudacao', array('nome' => $nome));
    } else {
        return View::make('404');
    }
    
});

Route::get('usuario/json/nome/{nome}', 'UsuarioController@testeJson');


Route::get('usuario/nome/{nome}', function($nome)
{
    if (View::exists('saudacao'))
    {
        return View::make('saudacao', array('nome' => $nome));
    } else {
        return View::make('404');
    }
    
});

// Transfere todas as rodas de controlador para o controller. É necesário usar o 
// get na definição dos métodos
Route::controller('controlador', 'ControladorController');

// Transfere todas as rodas de controlador para o controller. Não é necesário 
// usar o get na definição dos métodos
Route::resource('photo', 'PhotoController');