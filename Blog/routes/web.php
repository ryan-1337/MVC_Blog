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
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ticket/new', 'TicketController@show')->name('New');

Route::post('/ticket/new', 'TicketController@create')->name('New');
Route::get('/ticket/index', 'TicketController@index')->name('Index');

Route::post('/ticket/{id}/destroy', 'TicketController@destroy')->name('Delete');

Route::get('/ticket/{id}/edit', 'TicketController@edit')->name('Edit');
Route::post('/ticket/{id}/update', 'TicketController@update')->name('Update');


Route::post('/delete', 'UserController@delete_user')->name('delete-user');


// Route::get('/ticket/{id}/ticket', 'TicketController@showTicket')->name('Ticket');
Route::get('/ticket/{id}/ticket', 'CommentariesController@showCommentaries')->name('showCommentaries');
Route::post('/ticket/{id}/ticket', 'CommentariesController@create')->name('Commentaries');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')    
    ->middleware('is_admin')    
    ->name('admin');


Route::get('/admin/commentaires', 'AdminController@commentaires');    
Route::get('/admin/users', 'AdminController@users');    
Route::get('/admin/tickets', 'AdminController@tickets');    