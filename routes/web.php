<?php
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('user/{name}-{age}/view', 'HomeController@profile')->name('user.profile');

Route::group(['prefix' => 'news'], function($route){
    $route->get('/', 'ArticleController@index')->name('article.index');
    Route::group(['middleware' => 'auth'], function($route){
    	$route->get('create', 'ArticleController@create')->name('article.create');
    	$route->get('{article}/edit', 'ArticleController@edit')->name('article.edit')->middleware('can:make-action-this-post,article');
    	$route->put('{article}/edit', 'ArticleController@update')->name('article.update')->middleware('can:make-action-this-post');
    });
    $route->post('create', 'ArticleController@store');
    $route->get('/{article}', 'ArticleController@show')->name('article.show');
});
