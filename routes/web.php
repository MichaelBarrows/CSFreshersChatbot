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

Route::resource('chat', 'ChatbotController');

Route::resource('faqs', 'FAQController');
//
// Route::get('/chat/', function () {
//     return view('chatbot');
// });

// Route::get('/faqs/', function () {
//     return view('faqs/topic');
// });

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
// Route::get('/botman/tinker', 'BotManController@tinker');
