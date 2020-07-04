<?php
use App\Books;
use App\Book_type;
use illuminate\Http\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//    Route::get('/', 'HomeController@index')->name('home');
Route::get('/','HomeController@index')->name('index');
Route::get('/books','HomeController@findBookByName')->name('findBookByName');

Route::group(['prefix'=>'books_detail'], function () {
    Route::get('/{id}', 'HomeController@books_detail')->name('books_detail');
    Route::post('/{id}', 'HomeController@borrow_books')->name('borrow_books');
});
//Route::get('/profile/{id}','HomeController@profile')->name('profile');
Route::group(['prefix'=>'book','middleware'=>'checklogin'], function(){
    Route::get('/add-books','HomeController@add__books')->name('add__books');
    Route::post('/post_add_books','HomeController@post_add_books')->name('post_add_books');
});
Route::group(['prefix'=>'account'], function (){
    Route::get('/adminLogin','AccountController@adminLogin')->name('adminLogin');
    Route::post('/postLoginAdmin','AccountController@postLoginAdmin')->name('postLoginAdmin');
});

Route::get('/delete/{id}','HomeController@delete')->name('delete');

Route::group(['prefix'=>'profile'], function (){
    Route::get('/{id}','HomeController@profile')->name('profile');
    Route::post('/{id}','HomeController@return_books')->name('return_books');

});

//Route::group(['prefix'=>'edit__profile'], function(){
//    Route::get('/{id}','AccountController@get_edit__profile')->name('get_edit__profile');
//    Route::post('/{id}','AccountController@post_edit__profile')->name('post_edit__profile');
//});
Route::get('/get_edit__profile','AccountController@get_edit__profile')->name('get_edit__profile');

Route::get('/book_category/{name}','HomeController@getBookByCategory')->name('getBookByCategory');

Route::group(['prefix'=>'account'], function (){
    Route::get('/register','AccountController@getRegister')->name('getRegister');
    Route::post('/register','AccountController@postRegister')->name('postRegister');
    Route::get('/login','AccountController@getLogin')->name('getLogin');
    Route::post('/login','AccountController@postLogin')->name('postLogin');
    Route::get('/logout','AccountController@getLogout')->name('getLogout');
});
Route::group(['prefix'=>'dashboard'], function () {
    Route::get('/books', 'HomeController@book__manager')->name('book__manager');
    Route::get('/account', 'HomeController@account__manager')->name('account__manager');
});

Route::get('/search','HomeController@search');
