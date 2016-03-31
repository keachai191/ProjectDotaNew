<?php



Route::resource('control', 'sectionController');
Route::resource('/Album','AlbumController');
Route::get('/Album{userid}/','AlbumController@index');
Route::post('/Albums/{albumid}/','AlbumController@update');
Route::post('/AlbumsDestroy/{albumid}/','AlbumController@destroy');

Route::resource('home','PhotographerController');
Route::resource('update','UpdateController');

Route::get('/showalbum','ShowalbumController@index');
Route::post('/storealbum','ShowalbumController@storealbum');
Route::post('/updatealbum/{{$album->id}}','ShowalbumController@updatealbum');
Route::post('/destroyalbum','ShowalbumController@destroyalbum');

Route::get('/facebook','FacebookController@facebook');
Route::get('/callback','FacebookController@callback');

Route::post('updatealbum','UpdateAlbumController@store');


Route::get('/Calendar', function () {
    return view('calendar');
});


Route::get('/editcalendar{id}','CalendarController@editcalendar');
Route::post('/storecalendar','CalendarController@store');
Route::get('/Calendarsend','CalendarController@send');
Route::post('/CalendarUpdate{calendarid}','CalendarController@updatecalendar');
Route::post('/CalendarDestroy{calendarid}','CalendarController@destroy');




Route::get('/section', function () {
    return view('photograpViews.created');
});

Route::get('/section', function () {
return view('photograpViews.created');
});


Route::get('/edit', function () {
    return view('edit');

});


Route::get('/Memberuser',function(){
   return view('Memberuser');

});


Route::get('/test', function () {

    return view('test');
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

Route::get('/login',function() {
    return view('auth.login');
});
Route::get('/register',function() {
    return view('auth.register');
});

get('/photographer','Auth\AuthController@getLogin');
post('/auth/login','Auth\AuthController@postLogin');
get('/auth/logout','Auth\AuthController@getLogout');

get('/auth/register','Auth\AuthController@getRegister');
post('/auth/register','Auth\AuthController@postRegister');


get('/password/email','Auth\PasswordController@getEmail');
post('/password/email','Auth\PasswordController@postEmail');
get('/password/reset{token}','Auth\PasswordController@getReset');
post('/password/reset','Auth\PasswordController@postReset');









   