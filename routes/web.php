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

Auth::routes();

Route::get('/', function () {
  return view('layout.blog');
});

Route::get('/member', 'MemberController@getMemberInfo');
Route::post('/member', 'MemberController@postMemberInfo');

Route::get('/member/leave', 'MemberController@getMemberLeave');
Route::post('/member/leave', 'MemberController@postMemberLeave');

Route::get('/member/admin', 'MemberController@getMemberAdminList');
Route::get('/member/admin/{member}', 'MemberController@getMemberAdminInfo')->where('member','[0-9]+');
Route::post('/member/admin/{member}', 'MemberController@postMemberAdminEdit')->where('member','[0-9]+');
Route::post('/member/admin/{member}/remove', 'MemberController@postMemberAdminRemove')->where('member','[0-9]+');
