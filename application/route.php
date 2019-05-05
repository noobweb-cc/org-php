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
    '/getCookie' =>  'Index/getCookie',
    '/clearCookie' =>  'Index/clearCookie',
    '/login' => 'Index/login',
    '/loginOut' => 'Index/loginOut'
]);
Route::post([
    '/uploads' =>  'Index/uploads',
    '/login' => 'Index/login',
    '/loginOut' => 'Index/loginOut'
]);
