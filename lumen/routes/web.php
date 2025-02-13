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

$router->get("/species/all", "SpeciesController@getAll");
$router->get("/series/all", "SeriesController@getAll");
$router->get("/subseries/{id}", "SubseriesController@getOne");
$router->get("/characters/{id}", "CharacterController@getOne");
$router->post("partners/add", "speciesCharacterController@addPartner");
$router->get("partners/{id}", "speciesCharacterController@getOne");
$router->get("partners/check/{character}/{species}", "speciesCharacterController@checkPartners");
// $router->get("");
// $router->get("");