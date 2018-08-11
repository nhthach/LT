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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

 Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('licensentypes',['as'=>'user.lincesentype','uses' =>'LicenseTypeController@index']);
    Route::post('licenseranks',['as'=>'user.licenserank','uses' =>'LicenseRankController@loadRank']);
    Route::post('quizs',['as'=>'user.exam','uses' =>'ExamController@loadQuiz']);
    Route::post('questions',['as'=>'user.question','uses' =>'QuestionController@loadQuestion']);
    Route::post('article-category',['as'=>'user.question','uses' =>'ActicleController@loadActicleByCategory']);
});