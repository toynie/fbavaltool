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


use App\Question;
use App\Mail\MailOutput;
use App\TransactionQA;
use Illuminate\Support\Facades\Mail;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','BussTypeController@front_getBusinessTypes');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/frontend/{any}','AnalysisController@getBusinessTypes')->where('any', '.*');

Route::get('/selectBusiness','BussTypeController@front_getBusinessTypes')->name('selectBusiness');
Route::get('/userdetails','QuestionController@userDetailsPage');
Route::get('/tool/{option?}/{slug?}', 'QuestionController@tool')->where('all', '.*');
Route::get('/freequestions','QuestionController@getFreeQuestionsAnswers')->name('freeQuestions');
Route::get('/freequestions/full','QuestionController@getFreeQuestionsAnswers')->name('freeQuestionsfull');
Route::post('/addQA', 'AnalysisController@addQA');
Route::post('/continue', 'AnalysisController@continueLater');
// Route::get('/freeOutput', function(){
//     return view('frontend.freeOutput');
// });

Route::get('/freeOutput', 'AnalysisController@showFreeOutput')->name('freeOutput');

Route::prefix('cms')->middleware('auth')->name('cms.')->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('/settings','SettingController@index')->name('settings');
    Route::get('/settings/update','SettingController@updateSettings')->name('settings.update');
    Route::resource('/sets', 'QsetController', []);
    Route::resource('/bussTypes', 'BussTypeController', []);
    Route::resource('/question', 'QuestionController', []);
    Route::get('cms/question/add-from-list','QuestionController@addFromQuestionList')->name('addFromQuestionList');
    Route::get('cms/question/all','QuestionController@allQuestions')->name('questions.all');
    Route::resource('/answer', 'QanswerController', []);
    // Route::resource('/free', 'SettingController@index')->name('settings');
    Route::resource('/transaction', 'TransactionController', []);
    Route::resource('/transactionQA', 'TransactionQAController', []);
    Route::get('/analysis','AnalysisController@getTransactionQA')->name('analysis.getOutputAll');
    // Route::get('/testnetprofit',function(){
    //     $transactionId= 1;
    //     print( FbaHelpers::getNetProfit($transactionId));
    // });

    //Custom Answer Toggle
    Route::prefix('customAnswer')->name('customAnswer.')->group(function(){
        Route::get('/toggle','CustomAnwerController@toggle')->name('toggle');
        // Route::get('/','CustomAnwerController@index')->name('manage');
    });

    Route::resource('/customAnswer', 'CustomAnwerController', []);



});

// Frontend Vue router
// Route::get('frontend/{any}', 'AnalysisController@index')->where('any', '.*');

// Route::get('/tester', 'QsetController@index');

// Route::get('/email', function (){
//     Mail::to('ialexies@gmail.com')->send(new MailOutput());

//     return new MailOutput();
// });
Route::get('/email', function (){
    // Mail::to('ialexies@gmail.com')->send(new MailOutput());

    return view('emails.output');
});




Route::get('/test', function(){
    // return "fdf";
    $transactionQAId= 17;
    $questionId=52;

    $transactionQA = App\TransactionQA::find($transactionQAId);
    $answerList = App\Qanswer::where('question_id',$questionId)->get();
    dd($answerList[0]->userInput);


    $inputValArray = json_decode($transactionQA->inputValArray,true);

    dd($transactionQA);
    // return $inputValArray;
    // return $inputValArray[136];




    return ifGreen($inputValArray[136]);

    // $processedArrayVal = [];

    // foreach ($inputValArray as $key => $value) {
    //     // echo $value;
    //     $var =


    //     # code...
    // }
    // // $questionId = 1;

    // $questions =  $bussType ->answers(1)->get();

    // // dd($bussType->answers($questionId));
    // dd($questions);
    // // foreach($country->posts as $post){
    // //     return $post->title;
    // // }
});
