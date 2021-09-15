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



// Passport API
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('/questions/free', 'API\Questions\QuestionSetController@getAllFreeQuestions');

//API that needs token
// Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');

    Route::post('qsets/all', 'API\ApiQsetController@sets');
    Route::any('questions/all', 'API\ApiQuestionController@allQuestions');
    Route::any('answers/all', 'API\ApiAnswerController@allAnswers');

    Route::post('qset', 'API\ApiQsetController@set');
    Route::post('set/questions', 'API\ApiQuestionController@setQuestions');
    Route::post('question/answers', 'API\ApiAnswerController@qanswers');
    Route::any('question/answers/all', 'API\ApiQuestionController@getFreeQuestionsAnswers');
    Route::post('paid-output', 'API\ApiAnalysisController@getOutputAll');
    // Route::post('addQA', 'API\ApiAnalysisController@addQA');

    Route::post('paid-output-repository', 'API\ApiAnalysisController@getOutputAllRepository');

    // Route::post('business-types', 'API\ApiAnswerController@getBusinessTypes');
    // Route::post('business-types', 'API\ApiAnswerController@getBusinessTypes');
    Route::post('business-types', 'BussTypeController@getBusinessTypes');
    Route::post('questions-free', 'API\ApiQuestionController@getFreeQuestionsAnswers');  //used by api to get free questions

    Route::post('freequestions', 'API\ApiAnswerController@qanswers');

// });

Route::post('/addQA', 'API\ApiAnalysisController@addQA');

// Route::post('/addQA', function () {
//     return factory('App\User', 10)->make();
// });

Route::get('/users', function () {
    return factory('App\User', 10)->make();
});

Route::group(
    ['prefix'=>'auth'],
    function($router){
        // Route::post('login', 'AuthController@login');
        // Route::post('logout', 'AuthController@logout');
        // Route::post('refresh', 'AuthController@refresh');
        // Route::post('me', 'AuthController@me');
    }
);


