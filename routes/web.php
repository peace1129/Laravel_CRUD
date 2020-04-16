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

/**
 * アクセスルート
 */
Route::get('/', 'HomeController@index')
    ->name('index');

Route::middleware('auth')->group(function () {

    /**
     * 名簿一覧画面
     */
    Route::get('/members/index', 'MembersController@index')
        ->name('members.index');
    // グループ名検索
    Route::get('/members/group_search', 'MembersController@groupSearch')
        ->name('members.groups.search');
    // 新規登録　入力画面
    Route::get('/members/create', 'MembersController@createShow')
        ->name('members.create.show');
    // 新規登録　確認画面
    Route::get('/members/create_check', 'MembersController@createCheck')
        ->name('members.create.check');
    // 新規登録　実行
    Route::post('/members/create', 'MembersController@store')
        ->name('members.create.store');
    // 編集　入力画面
    Route::get('/members/{id}/edit', 'MembersController@editShow')
        ->name('members.edit.show');
    // 編集　確認画面
    Route::get('/members/{id}/editChk', 'MembersController@editCheck')
        ->name('members.edit.check');
    // 編集　実行
    Route::put('/members/{id}/editExec', 'MembersController@edit')
        ->name('members.edit');
    // 削除　確認画面
    Route::get('/members/{id}/delete', 'MembersController@deleteCheck')
        ->name('members.delete.check');
    // 削除　実行
    Route::delete('/members/{id}/delete', 'MembersController@delete')
        ->name('members.delete');

    /**
     * グループ一覧画面
     */
    Route::get('/groups/index', 'GroupsController@index')
        ->name('groups.index');
    // 新規作成　入力画面
    Route::get('/groups/create', 'GroupsController@createShow')
        ->name('groups.create.show');
    // 新規作成　確認画面
    Route::get('/groups/create_check', 'GroupsController@createCheck')
        ->name('groups.create.check');
    // 新規作成　実行
    Route::post('/groups/create', 'GroupsController@store')
        ->name('groups.create.store');
    // 編集　入力画面
    Route::get('/groups/{id}/edit', 'GroupsController@editShow')
        ->name('groups.edit.show');
    // 編集　確認画面
    Route::get('/groups/{id}/edit_check', 'GroupsController@editCheck')
        ->name('groups.edit.check');
    // 編集　実行
    Route::put('/groups/{id}/edit', 'GroupsController@edit')
        ->name('groups.edit');
    // 削除　確認画面
    Route::get('/groups/{id}/delete', 'GroupsController@deleteCheck')
        ->name('groups.delete.check');
    // 削除　実行
    Route::delete('/groups/{id}/delete', 'GroupsController@delete')
        ->name('groups.delete');

    /**
     * SPA向けルート
     */
    // 名簿一覧SPA
    Route::get('/members/index/spa', 'MembersController@indexSpa')
        ->name('members.index.spa');



    // グループ一覧SPA
    Route::get('/groups/index/spa', 'GroupsController@indexSpa')
        ->name('groups.index.spa');
});