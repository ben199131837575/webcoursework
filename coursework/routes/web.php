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
    return view('home');
});

Route::get('/events', 'EventsController@index')->name('events');
Route::post('/events', 'EventsController@eventSearch')->name('searchevents');
Route::get('/events/myevents', 'EventsController@myEvents')->name('my_events');

Route::get('/createevent', 'CreateEventController@index')->name('create_event');

Route::post('/createevent/createnewevent', 'CreateEventController@createNewEvent')->name('create_new_event');

Route::get('/editevent/{id}', 'CreateEventController@editEvent')->name('edit_event');
Route::get('/addimages/{id}', 'CreateEventController@addImages')->name('addimages');
Route::post('/addimages/{id}', 'CreateEventController@addImages')->name('addimages');

Route::post('/updateevent/{id}', 'CreateEventController@updateEvent')->name('update_event');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/likebutton/{id}', 'LikeButton@addLike')->name('likebutton');

Route::get('/viewevent/{id}', 'ViewEventController@index')->name('view_event_controller');

Route::get('/becomeorganiser', 'becomeorganiser@becomeorganiser')->name('becomeorganiser');

Route::get('/email/{email}', 'EmailClient@emailOrganiser')->name('email');
Route::post('/email', 'EmailClient@sendEmail')->name('sendEmail');

Route::get('/becomeorganiserform', function () {
    return view('becomeorganiserform');
})->name('becomeorganiserform');
