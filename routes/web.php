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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

$router->get('/', function () use ($router) {
    $data['uuidv4'] = '61422a4e-f8b9-40c4-b058-94598eb5e30f';
    $data['urlencoded'] = 'https%3A%2F%2Fwww.facebook.com%2Fdoelmi';
    $data['generatorUrl'] = 'https://www.uuidgenerator.net/version4';
    $data['customCode'] = 'myfb';
    $data['urlCodeExample'] = 'https://kode.rumahzen.my.id/kode.php?kunci=45ed7d20de3115bfd7fe25b6d1445768';
    return view('home', $data);
});

$router->get('/short', ['as' => 'short', 'uses' => 'UrlController@short']);
$router->get('/{url}', ['as' => 'url', 'uses' => 'UrlController@redirect']);
