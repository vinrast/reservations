<?php

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/', 'ReservationController@index');
    $router->post('/store', 'ReservationController@store');
    $router->put("/reservations/{id}", 'ReservationController@update');
});




