<?php

use App\Http\Livewire\AddContact;
use App\Http\Livewire\EditContact;
use App\Http\Livewire\ListContacts;
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

Route::get('/', ListContacts::class);
Route::get('/add', AddContact::class);
Route::get('/contact/{id}', EditContact::class);
