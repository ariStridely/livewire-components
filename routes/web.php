<?php

use App\Http\Livewire\Profile;
use App\Http\Livewire\ShowPost;
use App\Http\Livewire\Users\Index;
use Illuminate\Support\Facades\Route;

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

Route::get('/profile', Profile::class);
Route::get('/posts', ShowPost::class);
Route::get('/users', Index::class);
