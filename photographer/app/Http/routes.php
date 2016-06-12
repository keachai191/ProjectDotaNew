<?php


Route::resource('control', 'sectionController');
Route::resource('/Album', 'AlbumController');
Route::get('/Album{userid}/', 'AlbumController@index');
Route::post('/Albums/{albumid}/', 'AlbumController@update');
Route::post('/Comment/{commentid}/', 'CommentController@update');
Route::post('/AlbumsDestroy/{albumid}/', 'AlbumController@destroy');

Route::post('updatealbum', 'UpdateAlbumController@store');

Route::resource('home', 'PhotographerController');
Route::resource('update', 'UpdateController');
Route::get('/messagebox', 'PhotographerController@messagebox');

Route::get('/showalbum', 'ShowalbumController@index');
Route::post('/storealbum', 'ShowalbumController@storealbum');
Route::post('/updatealbum/{{$album->id}}', 'ShowalbumController@updatealbum');
Route::post('/destroyalbum', 'ShowalbumController@destroyalbum');

Route::get('/Profile{username}/', 'ProfileController@index');
Route::get('/ShowProfile{username}/', 'ProfileController@showprofile');


Route::get('/facebooklogin', 'FacebookController@facebooklogin');
Route::get('/callback', 'FacebookController@Callback');
Route::get('/sendreques{username}', 'FacebookController@sendreques');
Route::get('/sendreview{username}', 'FacebookController@sendreview');
Route::get('/checkloginfacebook', 'FacebookController@checkloginfacebook');
Route::get('/logoutfacebook', 'FacebookController@logoutfacebook');


Route::get('/Calendar', function () {
    return view('calendar');
});

Route::get('/editcalendar{id}', 'CalendarController@editcalendar');
Route::post('/storecalendar', 'CalendarController@store');
Route::get('/Calendarsend', 'CalendarController@send');
Route::get('/CalendarsendHome', 'CalendarController@sendHome');
Route::get('/CalendarShowprofile', 'CalendarController@Showprofile');
Route::post('/CalendarUpdate{calendarid}', 'CalendarController@updatecalendar');
Route::post('/CalendarDestroy{calendarid}', 'CalendarController@destroy');


Route::get('/Request','RequestController@index');
Route::post('/RequestStore','RequestController@store');
Route::post('/RequestUpdate/{requeid}/','RequestController@update');
Route::post('/Requestdestroy/{requeid}/','RequestController@destroy');
Route::get('/viewreques','RequestController@viewreques');
Route::get('/viewcomment','ReviewController@viewcomment');


Route::get('/confirm', function () {
    return view('confirmReques');
});

Route::get('/formreques{username}', function () {
    return view('formreques');
});
Route::get('/recordreques', function () {
    return view('recordreques');
});


Route::get('s', 'SearchController@getName');
Route::get('ReviewC', 'ReviewController@getReview');
Route::get('editComment{id}', 'ReviewController@editComment');
Route::post('updateComment/{id}', 'ReviewController@updateComment');
Route::post('destroyComment/{id}', 'ReviewController@destroyComment');
Route::get('/formreview{username}/{userphoto}','ReviewController@getReviewCheck');


Route::get('/editreview', function () {
    return view('editreview');
});

Route::get('/formreview{username}', function () {
    return view('formreview');

});


Route::get('/edit', function () {
    return view('edit');

});

Route::get('/Memberuser', function () {
    return view('Memberuser');

});

Route::get('/test', function () {
    return view('Test');
});
Route::get('/test2', function () {
    return view('Test2');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/member', function () {
    return view('member');
});

Route::get('/login', 'Auth\AuthController@checklogin');


Route::get('/register', function () {
    return view('auth.register');
});

get('/photographer', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

/*get('/auth/facebook', 'Auth\AuthController@redirecToProvider');
get('/callback', 'Auth\AuthController@handleProviderCallback');*/

get('/auth/register', 'Auth\AuthController@getRegister');
post('/auth/register', 'Auth\AuthController@postRegister');


get('/password/email', 'Auth\PasswordController@getEmail');
post('/password/email', 'Auth\PasswordController@postEmail');
get('/password/reset{token}', 'Auth\PasswordController@getReset');
post('/password/reset', 'Auth\PasswordController@postReset');

Route::get('/admin','AdminController@index');
Route::post('/adminUpdate/{userid}/','AdminController@update');











   