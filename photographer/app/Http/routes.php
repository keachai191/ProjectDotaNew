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


Route::get('/test123', function () {
    $albums = DB::table('albums')
        ->join('users','albums.user_id','=','users.id')
        ->where('albums.user_id')
        ->get();
    return $albums;
});

Route::get('/Calender', function () {
    return view('calender');

});

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



Route::post('postform','PostController@Add');


Route::get('checkemail','PostController@Checkemail');



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

get('/auth/facebook','Auth\AuthController@redirecToProvider');
get('/callback','Auth\AuthController@handleProviderCallback');



get('/password/email','Auth\PasswordController@getEmail');
post('/password/email','Auth\PasswordController@postEmail');
get('/password/reset{token}','Auth\PasswordController@getReset');
post('/password/reset','Auth\PasswordController@postReset');









   