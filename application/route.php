<?php
/**
 * Are you ok?
 */
use think\Route;
Route::get([
    '/' =>  'Index/home',
    'new/:id'  =>  'News/read',
    '/upload' =>  'Index/upload'
]);
Route::post([
    '/uploads' =>  'Index/uploads'
]);
