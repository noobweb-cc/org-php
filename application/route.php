<?php
/**
 * Are you ok?
 */
use think\Route;
Route::get([
    '/' =>  'Index/home',
    '/upload' =>  'Index/upload',
    'new/:id'  =>  'News/read',
    '/setCookie' =>  'Index/setCookie',
    '/getCookie' =>  'Index/getCookie'
]);
Route::post([
    '/uploads' =>  'Index/uploads'
]);
