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

// Route::get('/botman/tinker', 'BotManController@tinker');

/**
 * Home page
 *
 * Returns the home page view.
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Chat page
 *
 * Calls the chatbot controller to process keywords and return the view.
 */
Route::resource('chat', 'ChatbotController');

/**
 * FAQ's page
 *
 * Calls the FAQ controller to return the view.
 */
Route::resource('faqs', 'FAQController');

/**
 * Chatbot API
 *
 * Calls the botman controller to handle all chatbot api calls.
 */
Route::match(['get', 'post'], '/botman', 'BotManController@handle');
