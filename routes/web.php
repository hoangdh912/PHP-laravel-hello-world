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

Route::get('/hello/{message?}', function ($message = null) {
    $msg = 'Example: /hello/good-bye';
    if ($message != null) {
        $msg = 'Hello, ' . $message;
    }
    // resources/views/hello.blade.php
    return view('hello', ['message' => $msg]); //Using object
});

Route::get('/world/{message?}', 'WorldController@show');

Route::get('/hoang/{message2?}', 'HoangController@fuq');

/*
 *Using view array data
*/
/*
Route::get('/{squirrel}', function ($squirrel) {
  $data['squirrel'] = $squirrel; //Using array

  return View::make('simple', $data); // = function view();
});
*/
/*
 *Redirecting to another route
*/

Route::get('/1/first', function(){
  return Redirect::to('second'); // = function redirect();
});

Route::get('second', function(){
  return 'Second route';
});

/*
 *Create custom Responses
*/

Route::get('custom/response', function(){
  return Response::make('Hello world!', 200); // = function response();
});

Route::get('/usercontroller/path',[
    'middleware' => 'First',
    'uses' => 'UserController@showPath'
]);

/*
 *JSON response
*/

Route::get('markdown/response', function () {
  $data = ['iron', 'man', 'rocks'];
  return Response::json($data); // = function chain: response()->json()
});

/*
 *Response with a cookie
*/

Route::get('/', function(){
  $cookie = Cookie::make('low-carb', 'almond cookie', 30); //Cookie lasts 30 MINS (not SECONDS)

  return Response::make('Nom nom.')->withCookie($cookie);
});

Route::get('/nom-nom', function(){
  $cookie = Cookie::get('low-carb'); //In Laravel cookie has Security
  var_dump($cookie);
});

/*
 *Named route
*/

Route::get('/my/long/calendar/route', [
  'as' => 'calendar',
  function(){
    return View::make('calendar'); // After naming, can use route('calendar') as the name for the long path
  }
]);

/*
 *Parameter constraints
*/

Route::get('save/{princess}', function($princess){
  return "Sorry, {princess} is in another castle. :(";
})->where('princess', '[A-Za-z]+');




Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
    $hello_string = '';
    if($yourname == null){
        $hello_string = 'Hello world, ' . $year;
    }else{
        $hello_string = 'Hello world, ' . $year . '. My name is ' . $yourname;
    }
    return view('hello-world')->with('hello_str', $hello_string);
});

Route::get('/role',[
    'middleware'=>'role:superadmin',
    'uses'=>'MainController@checkRole'
]);

Route::get('/tin-tuc/{news_id_string}', 'MainController@showNews');

Route::get('category/laravel-nang-cao', 'MainController@uriTest');

Route::get('user-info', 'MainController@getUserInfo');

Route::get('contact', 'ContactController@showContactForm');

Route::post('contact', 'ContactController@insertMessage');
