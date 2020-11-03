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
	echo '12344';
    return view('welcome');
});

Route::get('/test',function(){
	echo '12344';
// $redis = app('redis.connection');
Redis::set('library', 'predis');
echo Redis::get('library');
// $redis->set('library', 'predis'); // 存储 key 为 library， 值为 predis 的记录；
// echo $redis->get('library');
	var_dump(DB::table('admin_roles')->get());
	exit;
});

Route::get('/admin/auth/lock', Auth\LockScreenController::class.'@lock')->name('laravel-admin-lock');
Route::get('/admin/auth/locks',Auth\LockScreenController::class.'@locks')->name('laravel-admin-lock');
Route::post('admin/auth/unlock', LockScreenController::class.'@unlock')->name('laravel-admin-unlock');