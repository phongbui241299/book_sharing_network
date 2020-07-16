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
Route::get('/search_content','HomeController@findBookByName')->name('findBookByName');

Route::group(['prefix'=>'books_detail'], function () {
    Route::get('/{id}', 'HomeController@books_detail')->name('books_detail');
    Route::post('/{id}', 'HomeController@borrow_books')->name('borrow_books');
});
//Route::get('/profile/{id}','HomeController@profile')->name('profile');
Route::group(['prefix'=>'book','middleware'=>'checklogin'], function(){
    Route::get('/add-books','HomeController@add__books')->name('add__books');
    Route::post('/post_add_books','HomeController@post_add_books')->name('post_add_books');
});

Route::group(['prefix'=>'typebook'], function(){
    Route::get('/add_type_books','HomeController@add_type_books')->name('add_type_books');
    Route::post('/post_type_books','HomeController@post_type_books')->name('post_type_books');
});

Route::group(['prefix'=>'account'], function (){
    Route::get('/adminLogin','AdminController@adminLogin')->name('adminLogin');
    Route::post('/postLoginAdmin','AdminController@postLoginAdmin')->name('postLoginAdmin');
});

Route::get('/delete_books/{id}','HomeController@delete_books')->name('delete_books');

Route::group(['prefix'=>'profile'], function (){
    Route::get('/{id}','HomeController@profile')->name('profile');
    Route::post('/{id}','HomeController@return_books')->name('return_books');

});

Route::group(['prefix'=>'get_edit__profile'], function (){
    Route::get('/{id}','HomeController@get_edit__profile')->name('get_edit__profile');
    Route::post('/{id}','HomeController@post_edit__profile')->name('post_edit__profile');
});

Route::group(['prefix'=>'edit__books'], function (){
    Route::get('/{id}','HomeController@get_edit__books')->name('get_edit__books');
    Route::post('/{id}','HomeController@post_edit_books')->name('post_edit_books');
});

Route::group(['prefix'=>'change_pass'], function () {
    Route::get('/{id}', 'HomeController@get_change_pass')->name('get_change_pass');
    Route::post('/{id}','HomeController@post_change_pass')->name('post_change_pass');
});

Route::get('/book_category/{name}','HomeController@getBookByCategory')->name('getBookByCategory');

Route::group(['prefix'=>'account'], function (){
    Route::get('/register','AccountController@getRegister')->name('getRegister');
    Route::post('/register','AccountController@postRegister')->name('postRegister');
    Route::get('/login','AccountController@getLogin')->name('getLogin');
    Route::post('/login','AccountController@postLogin')->name('postLogin');
    Route::get('/logout','AccountController@getLogout')->name('getLogout');
});

Route::group(['prefix'=>'dashboard'], function () {
    Route::get('/books', 'AdminController@book__manager')->name('book__manager');
    Route::post('/admin_delete_books/{id}','AdminController@admin_delete_books')->name('admin_delete_books');
});

Route::group(['prefix'=>'account_manage'], function () {
    Route::get('/account', 'AdminController@account__manager')->name('account__manager');
    Route::post('/delete_user/{id}','AdminController@delete_user')->name('delete_user');
});

Route::group(['prefix'=>'type_manage'], function () {
    Route::get('/type_book_manager', 'AdminController@type_book_manager')->name('type_book_manager');
    Route::post('/update_type_book_manager/{id}', 'AdminController@update_type_book_manager')->name('update_type_book_manager');
});
Route::get('/search','HomeController@search');
Route::get('/filter','HomeController@search_ajax');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/user__list','HomeController@user__list')->name('user__list');
Route::get('/city','HomeController@getCity');
Route::get('/district','HomeController@getDistrict');
