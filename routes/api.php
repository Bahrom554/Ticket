<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/allregion','Api\TicketController@allregion');
Route::get('/allticket','Api\TicketController@allticket');
Route::post('/order','Api\TicketController@order');
Route::post('/ticket','Api\TicketController@ticket');

