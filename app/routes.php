<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'people', 'uses' => 'PeopleController@getPeople'));
Route::get('/people/add', array('as' => 'peopleAdd', 'uses' => 'PeopleController@getAddPeople'));
Route::post('/people/add', array('as' => 'peopleAdd', 'uses' => 'PeopleController@postAddPeople'));

Route::group(array('before' => 'guest'), function()
{
    Route::get('/login', array('as' => 'login', 'uses' => 'CredentialController@getLogin'));
    Route::post('/login', 'CredentialController@postLogin');
    Route::get('/register', array('as' => 'register', 'uses' => 'CredentialController@getRegister'));
    Route::post('/register', array('as' => 'register', 'uses' => 'CredentialController@postRegister'));
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/logout', array('as' => 'logout', 'uses' => 'CredentialController@getLogout'));
	Route::get('/people/edit/{id}', array('as' => 'peopleEdit', 'uses' => 'PeopleController@getEditPeople'))->where('id', '[0-9]+');
	Route::post('/people/edit/{id}', array('as' => 'peopleEdit', 'uses' => 'PeopleController@postEditPeople'))->where('id', '[0-9]+');
	Route::get('/people/delete/{id}', array('as' => 'peopleDelete', 'uses' => 'PeopleController@getDeletePeople'))->where('id', '[0-9]+');

});