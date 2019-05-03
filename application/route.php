<?php
/**
 * Are you ok?
 */
use think\Route;
Route::get([
    '/' =>  'Index/home',
    '/upload' =>  'Index/upload',
    'new/:id'  =>  'News/read',
    '/setCookie' =>  'Index/setCookie'
])
Route::get(['/getCookie' =>  'Index/getCookie'])
    ->allowCrossDomain();
Route::post([
    '/uploads' =>  'Index/uploads'
]);
