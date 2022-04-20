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
    //return view('welcome');
    return view('home');
});

Route::get('/login', function () {
	if(!Auth::user()){
    	return view('login');
    }
    else
    {
        return redirect('/');
    }
});

Route::get('/register', function () {
	if(!Auth::user())
	{
    	return view('register');
	}
	else
	{
		return redirect('/');
	}
});

Route::get('/post_article', function () {
	if(Auth::user())
	{
    	return view('post_article');
	}
	else
	{
		return redirect('/');
	}
});
Route::get('/all_article','ArticleController@showall');
Route::get('/my_article','ArticleController@showmyarticle');
Route::get('/update_article/{id}','ArticleController@update_form');
Route::put('/update_article_action','ArticleController@update_action');
Route::delete('/delete_article/{id}','ArticleController@destroy');
Route::post('/register_action','RegisterController@store');

Route::post('/login_action','LoginController@store');

Route::post('/post_article_action','ArticleController@store');

Route::get('/logout',function(){
	Auth::logout();

	return redirect("/login");
})->middleware("auth");
//Auth::routes();
Route::get('/user/activation/{token}','RegisterController@userActivation');
Route::get('/home', 'HomeController@index')->name('home');
