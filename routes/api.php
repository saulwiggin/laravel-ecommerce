<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/ingredients', 'IngredientController@index');

Route::post('/recipes', 'recipe@save');
Route::get('/recipe/{id}', 'recipe@fetch');
Route::resource('/cruds', 'cruds', [
  'except' => ['edit', 'show', 'store']
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
