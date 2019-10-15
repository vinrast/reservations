<?php

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/reservations', 'ReservationController@index');
    $router->post('/reservation/store', 'ReservationController@store');
    $router->put("/reservation/{id}", 'ReservationController@update');
});




