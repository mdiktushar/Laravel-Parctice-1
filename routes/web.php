<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\User;
use App\Models\Country;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Taggable;
use App\Models\Tag;

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

Route::get('/inputUser', function () {
    DB::insert(
        'insert into users(name, email, password) values(?,?,?)',
        ['selena','selena@dkd.cod','123456']
    );
});


Route::get('/red', function () {
    $data = DB::select('select *from users');
    return $data;
});

Route::get('/update', function () {
    DB::update('update users set password = "123456" where id = ?', [1]);
});

Route::get('/delete', function () {
    DB::delete('delete from users where id=?', [1]);
});

Route::get('/softDelete', function () {
    Book::find(6)->delete();
});

Route::get('/redsoftDelete', function () {
    // return Book::find(5);
    // return Book::withTrashed()->where('id', 5)->get();
    return Book::onlyTrashed()->get();
});

Route::get('/restore', function () {
    Book::onlyTrashed()->where('id', 5)->restore();
});

Route::get('/forceDelete', function () {
    Book::withTrashed()->where('id', 7)->forceDelete();
});

// Eloquent Relationships

Route::get('/user/{id}/book', function ($id) {
    return User::find($id)->book;
});

Route::get('/book/{id}/user', function ($id) {
    return Book::find($id)->user;
});

Route::get('/books', function () {
    $user = User::find(1);
    
    foreach ($user->books as $book) {
        echo $book."<br>";
    }
});

Route::get('/user/{id}/role', function ($id) {
    $user = User::find($id)->roles;
    return $user;
});

Route::get('/user/country/{id}', function ($id) {
    $country = Country::find($id);
    return $country->books;
});


Route::get('user/{id}/photos', function ($id) {
    $user = User::find($id);
    foreach ($user->photos as $photo) {
        return $photo;
    }
});


Route::get('post/{id}/photos', function ($id) {
    $post = Post::find($id);
    foreach ($post->photos as $photo) {
        echo $photo ."<br>";
    }
});

Route::get('/photo/{id}/post', function ($id) {
    $photo = Photo::findOrFail($id);
    return $photo->imageable;
});

Route::get('/post/tag', function ($id = null) {
    $post = Post::find(1);
    
    foreach ($post->tags as $tag) {
        echo $tag->name;
    }
});
