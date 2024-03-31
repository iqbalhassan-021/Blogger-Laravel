<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\post_blog;
use App\Http\Controllers\site_info;
use App\Http\Controllers\subscribers;
use Illuminate\Support\Facades\Route;

Route::get('/',[Controller::class,'home']);
Route::get('/search',[Controller::class,'search']);
Route::get('/auth',[Controller::class,'auth']);
Route::get('/blogs',[Controller::class,'blogs']);
Route::get('/blog/{id}',[Controller::class,'single']);
Route::post('login',[auth::class,'login']);
Route::post('post_blog',[post_blog::class,'add_blog']);
Route::post('subscribe',[subscribers::class,'new_subscriber']);
Route::post('site_details',[site_info::class,'site']);
Route::get('delete/{id}',[post_blog::class,'delete']);
Route::post('resetpassword',[auth::class,'reset']);
