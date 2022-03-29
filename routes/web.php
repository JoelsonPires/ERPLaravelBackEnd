<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'pedidos'], function () use ($router) {
    Route::get('/',        ['uses' => 'PedidoController@getAll']);
});
Route::group(['prefix' => 'order'], function () use ($router) {
    Route::get('/{id}/{qtd}', ['uses' => 'PedidoController@getOrder']);
});

Route::group(['prefix' => 'v1'], function () use ($router) {
    Route::get('/order/{id}/{qtd}', ['uses' => 'PedidoController@getV1Order']);
});

Route::group(['prefix' => 'web_api'], function () use ($router) {
    Route::get('/order/{id}/{qtd}', ['uses' => 'PedidoController@getAPIwebOrder']);
});
