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
    return redirect()->route('books.index');

    return view('welcome');
});
Route::resource("books","BookController");
Route::resource("authors","AuthorController")->except("show");
Route::resource("partners","PartnerController");
Route::resource("loans","LoanController")->only("index","update","store","create");
