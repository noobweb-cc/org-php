<?php
/**
 * Are you ok?
 */
use think\Route;
Route::get([
    '/' =>  'Index/home',
    '/upload' =>  'Index/upload',
    'new/:id'  =>  'News/read'
]);
Route::post([
    '/uploads' =>  'Index/uploads'
]);
