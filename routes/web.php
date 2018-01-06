<?php

use App\Events\MessagePosted;
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

Route::get('/messages', function(){
	return App\Message::with('user')->get();

});

Route::post('/messages', function(){
	$user = auth()->user();
	
	$message = $user->messages()->create([
		'message' => request()->get('message')
	]);

	//Announce that a new message has been posted using the message content and the person who posted the message
	broadcast(new MessagePosted($message, $user))->toOthers();
	return ['status' => 'Ok!'];
});

Route::get('/chat', function(){
	return view('chat');
})->middleware('auth');	
Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
