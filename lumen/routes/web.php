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
$router->get("/submitter/{id}", "CharacterController@getSubmitter");
$router->post("partners/add", "SpeciesCharacterController@addPartner");
$router->get("partners/{id}", "SpeciesCharacterController@getOne");
$router->get("partners/check/{character}/{species}/{shiny}", "speciesCharacterController@checkPartners");
$router->post("suggestion/add", "SuggestionController@addSuggestion");
$router->post("partners/update/{id}", "SpeciesCharactercontroller@updateOne");
$router->get("/user-vote/check/{user}/{vote}", "UserVoteController@checkOne");
$router->get("/upvotes/{id}", "UserVoteController@getOne");
$router->post("/user-vote/post", "UserVoteController@postOne");
$router->get("/register/check/user/{user}", "UserController@checkUser");
$router->get("/register/check/email/{email}", "UserController@checkEmail");
$router->post("/register", "UserController@saveUser");
$router->post("/user/update/{id}", "UserController@updateUser");
$router->get("/load/{id}", "UserController@loadUser");
// $router->get("");
// $router->get("");