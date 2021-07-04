<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'PageController@index');
Route::get('/index', 'PageController@index');
//Route::get('/autoriubio/{id}', 'PageController@autoriai');
//Route::get('/autoriai/{id}', 'AutoriaiController@autoriubio');
Route::get('/autoriai/{id}', 'AutoriaiController@showProfile');
//Route::get('/iautoriai', 'PageController@iautoriai');
Route::get('/kontaktai', 'PageController@kontaktai');
Route::get('/biografiniai', 'PageController@biografiniai');
Route::get('/detektyvai', 'PageController@detektyvai');
Route::get('/fantastika', 'PageController@fantastika');
Route::get('/mistiniai', 'PageController@mistiniai');
Route::get('/moksliniai', 'PageController@moksliniai');
Route::get('/prisijungimas', 'KnygosController@index');
Route::get('/psichologiniai', 'PageController@psichologiniai');
Route::get('/romanai', 'PageController@romanai');
Route::get('/siaubas', 'PageController@siaubas');
Route::get('/autoriai', 'AutoriaiController@index');
Route::get('/zanrai', 'ZanraiController@index');
Route::get('/leidyklos', 'LeidyklosController@index');
Route::get('/skaitytojai', 'SkaitytojaiController@index');
Route::get('/rezervacijos', 'RezervacijosController@index');


Route::get('/manageAutoriai', 'AutoriaiController@index2')->name('addAutoriai');
Route::post('/manageAutoriai', 'AutoriaiController@insertAutoriai')->name('manageAutoriai');
Route::get('/manageAutoriai/{id}', 'AutoriaiController@deleteAutoriai')->name('deleteAutoriai');
Route::get('/manageAutoriai/editAutoriai/{id}', 'AutoriaiController@editAutoriai')->name('editAutoriai');
Route::post('confirmEditedAutoriai/{id}', 'AutoriaiController@confirmEditedAutoriai')->name('confirmEditedAutoriai');

Route::get('/manageLeidyklos', 'LeidyklosController@index2')->name('addLeidyklos');
Route::post('/manageLeidyklos', 'LeidyklosController@insertLeidyklos')->name('manageLeidyklos');
Route::get('/manageLeidyklos/{id}', 'LeidyklosController@deleteLeidyklos')->name('deleteLeidyklos');
Route::get('/manageLeidyklos/editLeidyklos/{id}', 'LeidyklosController@editLeidyklos')->name('editLeidyklos');
Route::post('confirmEditedLeidyklos/{id}', 'LeidyklosController@confirmEditedLeidyklos')->name('confirmEditedLeidyklos');

Route::get('/managePrisijungimas', 'KnygosController@index2')->name('addPrisijungimas');
Route::post('/managePrisijungimas', 'KnygosController@insertPrisijungimas')->name('managePrisijungimas');
Route::get('/managePrisijungimas/{id}', 'KnygosController@deletePrisijungimas')->name('deletePrisijungimas');
Route::get('/managePrisijungimas/editPrisijungimas/{id}', 'KnygosController@editPrisijungimas')->name('editPrisijungimas');
Route::post('confirmEditedPrisijungimas/{id}', 'KnygosController@confirmEditedPrisijungimas')->name('confirmEditedPrisijungimas');

Route::get('/manageRezervacijos', 'RezervacijosController@index2')->name('addRezervacijos');
Route::post('/manageRezervacijos', 'RezervacijosController@insertRezervacijos')->name('manageRezervacijos');
Route::get('/manageRezervacijos/{id}', 'RezervacijosController@deleteRezervacijos')->name('deleteRezervacijos');
Route::get('/manageRezervacijos/editRezervacijos/{id}', 'RezervacijosController@editRezervacijos')->name('editRezervacijos');
Route::post('confirmEditedRezervacijos/{id}', 'RezervacijosController@confirmEditedRezervacijos')->name('confirmEditedRezervacijos');

Route::get('/manageSkaitytojai', 'SkaitytojaiController@index2')->name('addSkaitytojai');
Route::post('/manageSkaitytojai', 'SkaitytojaiController@insertSkaitytojai')->name('manageSkaitytojai');
Route::get('/manageSkaitytojai/{id}', 'SkaitytojaiController@deleteSkaitytojai')->name('deleteSkaitytojai');
Route::get('/manageSkaitytojai/editSkaitytojai/{id}', 'SkaitytojaiController@editSkaitytojai')->name('editSkaitytojai');
Route::post('confirmEditedSkaitytojai/{id}', 'SkaitytojaiController@confirmEditedSkaitytojai')->name('confirmEditedSkaitytojai');

Route::get('/manageZanrai', 'ZanraiController@index2')->name('addZanrai');
Route::post('/manageZanrai', 'ZanraiController@insertZanrai')->name('manageZanrai');
Route::get('/manageZanrai/{id}', 'ZanraiController@deleteZanrai')->name('deleteZanrai');
Route::get('/manageZanrai/editZanrai/{id}', 'ZanraiController@editZanrai')->name('editZanrai');
Route::post('confirmEditedZanrai/{id}', 'ZanraiController@confirmEditedZanrai')->name('confirmEditedZanrai');
