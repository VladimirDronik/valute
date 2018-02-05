<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    
    return view('welcome');

});

*/


Route::get('/', 'Valute@index'); //Обычный роут для главной страницы
Route::get('/getmsg', 'ValuteAjax@index'); //Роут для обработки данных AJAX

