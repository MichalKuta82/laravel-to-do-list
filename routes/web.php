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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/projects', 'ProjectController', ['names' => [
		'index' => 'projects.index',
		'edit' => 'projects.edit',
		'create' => 'projects.create',
		'store' => 'projects.store',
		'destroy' => 'projects.destroy',
		'show' => 'projects.show',
		'update' => 'projects.update',
	]]);

Route::resource('/tasks', 'TaskController', ['names' => [
		'index' => 'tasks.index',
		'edit' => 'tasks.edit',
		'store' => 'tasks.store',
		'destroy' => 'tasks.destroy',
		'show' => 'tasks.show',
		'update' => 'tasks.update',
	]]);

Route::get('projects/{project_id}/tasks/create', 'TaskController@create')->name('tasks.create');