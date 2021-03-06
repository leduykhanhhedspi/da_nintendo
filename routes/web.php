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
/* user side router */
Route::post('/language', array (
	'as' => 'language',
	'Middleware' => 'LanguageSwitcher',
	'uses' => 'LanguageController@index',
));
Route::get('/',['as'=>'home', 'uses'=>'StaticPagesController@home']);
Route::get('/games/{id}/show',['as' => 'games.show', 'uses' => 'GamesController@show']);
Route::post('/games/{id}/show',['middleware' => ['auth'] , 'as' => 'games.comment', 
	'uses' => 'GamesController@comment']);
Route::get('/games/{id}/show/comment/{comment_id}/delete',['middleware' => ['auth'] , 'as' => 'games.comment.delete', 
	'uses' => 'GamesController@delete_comment']);
Route::get('/systems/{id}/show',['as' => 'systems.show', 'uses' => 'SystemsController@show']);
Route::post('/games/search', ['as' => 'games.search', 'uses' => 'SearchsController@search' ]);
Route::get('/games/search', ['as' => 'search', 'uses' => 'SearchsController@show']);
Route::get('/games/advancedsearch', ['as' => 'search', 'uses' => 'SearchsController@advancedsearchshow']);
Route::post('/games/advancedsearch', ['as' => 'games.advancedsearch', 'uses' => 'SearchsController@advancedsearch' ]);
Route::get('/users/{id}/show', ['as' => 'users.show', 'uses' => 'ProfilesController@show']);
Route::get('/users/{id}/edit', ['as' => 'users.edit', 'uses' => 'ProfilesController@edit']);
Route::post('/users/{id}/edit', ['as' => 'users.update', 'uses' => 'ProfilesController@update']);
Route::get('/categories/{id}/show', ['as' => 'categories.show','uses' => 'CategoriesController@show']);
Route::post('/games/feedback',['middleware' => ['auth'] , 'as' => 'games.feedback', 
	'uses' => 'FeedbacksController@feedback']);
Route::post('/games/bookmark', ['as' => 'games.bookmark', 'uses' => 'BookmarksController@bookmark']);

/* admin side router */
Route::group(['prefix'=>'admin', 'middleware' => ['auth','admin'] ], function () {
	Route::get('home',['as'=>'admin.home', 'uses'=>'Admin\HomeController@home']);
	Route::group(['prefix'=>'system'], function () {
		Route::get('create',['as'=>'admin.system.create', 'uses'=>'Admin\SystemsController@create']);
		Route::post('store',['as'=>'admin.system.store', 'uses'=>'Admin\SystemsController@store']);
		Route::get('index',['as'=>'admin.system.index', 'uses'=>'Admin\SystemsController@index']);
		Route::get('destroy/{id}',['as'=>'admin.system.destroy', 'uses'=>'Admin\SystemsController@destroy']);
		Route::get('edit/{id}',['as'=>'admin.system.edit', 'uses'=>'Admin\SystemsController@edit']);
		Route::post('edit/{id}',['as'=>'admin.system.update', 'uses'=>'Admin\SystemsController@update']);
	});
	Route::group(['prefix'=>'game'], function () {
		Route::get('create',['as'=>'admin.game.create', 'uses'=>'Admin\GamesController@create']);
		Route::post('store',['as'=>'admin.game.store', 'uses'=>'Admin\GamesController@store']);
		Route::get('index',['as'=>'admin.game.index', 'uses'=>'Admin\GamesController@index']);
		Route::get('destroy/{id}',['as'=>'admin.game.destroy', 'uses'=>'Admin\GamesController@destroy']);
		Route::get('edit/{id}',['as'=>'admin.game.edit', 'uses'=>'Admin\GamesController@edit']);
		Route::post('edit/{id}',['as'=>'admin.game.update', 'uses'=>'Admin\GamesController@update']);
	});
	Route::group(['prefix'=>'category'], function () {
		Route::get('create',['as'=>'admin.category.create', 'uses'=>'Admin\CategoriesController@create']);
		Route::post('store',['as'=>'admin.category.store', 'uses'=>'Admin\CategoriesController@store']);
		Route::get('index',['as'=>'admin.category.index', 'uses'=>'Admin\CategoriesController@index']);
		Route::get('destroy/{id}',['as'=>'admin.category.destroy', 'uses'=>'Admin\CategoriesController@destroy']);
		Route::get('edit/{id}',['as'=>'admin.category.edit', 'uses'=>'Admin\CategoriesController@edit']);
		Route::post('edit/{id}',['as'=>'admin.category.update', 'uses'=>'Admin\CategoriesController@update']);
	});
	Route::group(['prefix'=>'user'], function () {
		Route::get('index',['as'=>'admin.user.index', 'uses'=>'Admin\UsersController@index']);
		Route::get('destroy/{id}',['as'=>'admin.user.destroy', 'uses'=>'Admin\UsersController@destroy']);
	});
	Route::group(['prefix'=>'feedback'], function () {
		Route::get('index',['as'=>'admin.feedback.index', 'uses'=>'Admin\FeedbacksController@index']);
	});	
});
Auth::routes();


